@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->
                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Profile Edit</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.user')}}"><button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('update.user',$data->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">User Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control input-default" value="{{$data->name}}">
                                        </div>
                                        @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control input-default" value="{{$data->email}}">
                                        </div>
                                        @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">User Type <span class="text-danger">*</span></label>
                                            <select name="usertype" class="form-control form-control-lg bg-secondary" id="">
                                                <option value="Admin" {{$data->usertype=="Admin"?'selected':''}}>Admin</option>
                                                <option value="Marketing" {{$data->usertype=="Marketing"?'selected':''}}>Marketing</option>
                                                <option value="Teacher" {{$data->usertype=="Teacher"?'selected':''}}>Teacher</option>
                                                <option value="OfficeAdmin" {{$data->usertype=="OfficeAdmin"?'selected':''}}>Office Admin</option>
                                            </select>     
                                            @error('usertype')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror                                 
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                        </div>


                                        <input type="submit" class="btn btn-success" value ="Update Account">

                                    </form>
                                </div>
                            </div>
                        </div>

            </div>
        </div>


@endsection