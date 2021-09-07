@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi {{$result->name}}, welcome back!</h4>
                            <p class="mb-0">Your Profile Dashboard</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('user.profile')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
                    </div>
                </div>
                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Profile Edit</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control input-default " value="{{$result->name}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control input-default " value="{{$result->email}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="profile_photo_path" class="custom-file-input" id="image" onchange="document.getElementById('showImage').src = window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <img id="showImage" src="{{(!empty($result->profile_photo_path))?url('upload/user_images/'.$result->profile_photo_path):url('upload/no_image.jpg')}}" class="img-fluid rounded-circle" alt="" style="width:100px;height:100px">
                                        </div>

                                        <input type="submit" class="btn btn-success" value ="Update Profile">

                                    </form>
                                </div>
                            </div>
                        </div>

            </div>
        </div>


@endsection