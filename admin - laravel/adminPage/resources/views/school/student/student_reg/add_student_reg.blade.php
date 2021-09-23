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
                                    <form method="post" action="{{route('store.student_reg')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Student Name</label>
                                            <input type="text" name="name" class="form-control input-default lg bg-secondary">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control form-control-lg bg-secondary" name="gender">
                                            <option value="" selected="" disabled="">Please Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                               </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob">DOB</label>
                                            <input type="date" name="dob" class="form-control bg-secondary input-default lg bg-secondary">
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" name="mobile" class="form-control input-default lg bg-secondary">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control input-default lg bg-secondary">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Email</label>
                                            <input type="email" name="email" class="form-control input-default lg bg-secondary">
                                        </div>
                                        </div>
                                        </div>

                                        <input type="submit" class="btn btn-success" value ="Create New Account">

                                    </form>
                                </div>
                            </div>
                        </div>

            </div>
        </div>


@endsection