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
                            <a href="{{route('all.employee_reg')}}"><button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('store.employee_reg')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control input-default" maxlength="32">
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fname">Father Name</label>
                                            <input type="text" name="fname" class="form-control input-default" maxlength="32">
                                            @error('fname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mname">Mother Name</label>
                                            <input type="text" name="mname" class="form-control input-default" maxlength="32">
                                            @error('mname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Gender <span class="text-danger">*</span></label>
                                            <select class="form-control bg-secondary" name="gender">
                                            <option value="" selected="" disabled="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                               </select>
                                               @error('gender')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob">DOB <span class="text-danger">*</span></label>
                                            <input type="date" name="dob" class="form-control bg-secondary" min="1950-01-01">
                                            @error('dob')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="designation_id">Designation <span class="text-danger">*</span></label>
                                            <select class="form-control bg-secondary" name="designation_id">
                                            <option value="" selected="" disabled="">Select Designation</option>
                                            @foreach($designation as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach	 
                                            </select>
                                            @error('designation_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                            <input type="text" name="mobile" class="form-control input-default" maxlength="12">
                                            @error('mobile')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control input-default">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="join_date">Joining Date <span class="text-danger">*</span></label>
                                            <input type="date" name="join_date" class="form-control bg-secondary input-default" min="2011-01-01">
                                            @error('join_date')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        </div>
                                        
                                        <div class="row">
                                        <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="address">Address <span class="text-danger">*</span></label>
                                            <input type="text" name="address" class="form-control input-default">
                                            @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group">
                                          <label for="image">Profile Image <span class="text-danger">*</span></label>
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image" onchange="document.getElementById('showImage').src = window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <img id="showImage" src="{{url('upload/no_image.jpg')}}" class="img-fluid rounded-circle" alt="" style="width:100px;height:100px">
                                        @error('image')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>

                                        <input type="submit" class="btn btn-success" value ="Submit">

                                    </form>
                                </div>
                            </div>
                        </div>

            </div>
        </div>


@endsection