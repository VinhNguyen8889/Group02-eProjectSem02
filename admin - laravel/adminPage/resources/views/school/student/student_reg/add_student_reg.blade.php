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
                                            <input type="text" name="name" class="form-control input-default">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fname">Father Name</label>
                                            <input type="text" name="fname" class="form-control input-default">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mname">Mother Name</label>
                                            <input type="text" name="mname" class="form-control input-default">
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
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
                                            <input type="date" name="dob" class="form-control bg-secondary input-default">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" name="mobile" class="form-control input-default">
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control input-default">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <select class="form-control form-control-lg bg-secondary" name="year_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($years as $year)
                                                     <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach	 
                                               </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="class">Class</label>
                                            <select class="form-control form-control-lg bg-secondary" name="class_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($classes as $class)
                                                     <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach	 
                                               </select>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Group</label>
                                            <select class="form-control form-control-lg bg-secondary" name="group_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($groups as $group)
                                                     <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach	 
                                               </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="shift">Shift</label>
                                            <select class="form-control form-control-lg bg-secondary" name="shift_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($shifts as $shift)
                                                     <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                                @endforeach	 
                                               </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="discount">Discount</label>
                                            <input type="text" name="discount" class="form-control input-default">
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group">
                                          <label for="gender">Profile Image</label>
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="profile_photo_path" class="custom-file-input" id="image" onchange="document.getElementById('showImage').src = window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <img id="showImage" src="{{(!empty($result->profile_photo_path))?url('upload/user_images/'.$result->profile_photo_path):url('upload/no_image.jpg')}}" class="img-fluid rounded-circle" alt="" style="width:100px;height:100px">
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