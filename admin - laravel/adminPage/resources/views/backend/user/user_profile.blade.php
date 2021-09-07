@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your Profile Dashboard</p>
                        </div>
                    </div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('user.profile.edit')}}"><button type="button" class="btn btn-secondary">Update Profile</button></a>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="profile-info">
									<div class="profile-photo">
										<img src="{{(!empty($result->profile_photo_path))?url('upload/user_images/'.$result->profile_photo_path):url('upload/no_image.jpg')}}" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">{{$result->name}}</h4>
											<p>Login User Name</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">{{$result->email}}</h4>
											<p>Email</p>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


@endsection