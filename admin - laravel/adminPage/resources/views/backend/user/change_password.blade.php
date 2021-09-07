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
                                <h4 class="card-title">User Password Change</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('password.update')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="info-title">Current Password</label>
                                            <input id="current_password" type="password" name="current_password" class="form-control input-default">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">New Password</label>
                                            <input id="password" type="password" name="password" class="form-control input-default">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">Confirm Password</label>
                                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control input-default">
                                        </div>

                                        <input type="submit" class="btn btn-success" value ="Change Password">

                                    </form>
                                </div>
                            </div>
                        </div>

            </div>
        </div>


@endsection