@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->
                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Registration</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.student_reg')}}"><button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('update.student_reg',$student->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Student Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control input-default lg bg-secondary" value="{{$student->name}}">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Gender <span class="text-danger">*</span></label>
                                            <select class="form-control form-control-lg bg-secondary" name="gender">
                                            <option value="" selected="" disabled="">Please Select</option>
                                            <option value="Male" {{$student->gender=="Male"?"selected":""}}>Male</option>
                                            <option value="Female" {{$student->gender=="Female"?"selected":""}}>Female</option>
                                               </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob">DOB <span class="text-danger">*</span></label>
                                            <input type="date" name="dob" class="form-control bg-secondary input-default lg bg-secondary"value="{{$student->dob}}" >
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                            <input type="text" name="mobile" class="form-control input-default lg bg-secondary" value="{{$student->mobile}}">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address <span class="text-danger">*</span></label>
                                            <input type="text" name="address" class="form-control input-default lg bg-secondary" value="{{$student->address}}">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control input-default lg bg-secondary" value="{{$student->email}}">
                                        </div>
                                        </div>
                                        </div>

                                        <input type="submit" class="btn btn-success" value ="Update Information">

                                    </form>
                                </div>
                            </div>
                        </div>

            </div>
        </div>


@endsection