@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->
                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Registration</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.employee_reg')}}"><button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('update.employee_reg', $editData->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $editData->id }}">
                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control input-default" maxlength="32" value="{{ $editData->name }}">
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fname">Father Name</label>
                                            <input type="text" name="fname" class="form-control input-default" maxlength="32" value="{{ $editData->fname}}">
                                            @error('fname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mname">Mother Name</label>
                                            <input type="text" name="mname" class="form-control input-default" maxlength="32" value="{{ $editData->mname }}">
                                            @error('mname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control form-control-lg bg-secondary" name="gender">
                                            <option value="" selected="" disabled="">Select Gender</option>
                                            <option value="Male" {{ ($editData->gender == 'Male')? 'selected':'' }}>Male</option>
                                            <option value="Female" {{ ($editData->gender == 'Female')? 'selected':'' }}>Female</option>
                                            <option value="Other" {{ ($editData->gender == 'Other')? 'selected':'' }}>Other</option>
                                               </select>
                                               @error('gender')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob">DOB</label>
                                            <input type="date" name="dob" class="form-control bg-secondary input-default" value="{{ $editData->dob }}" min="1950-01-01">
                                            @error('dob')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="designation_id">Designation</label>
                                            <select class="form-control form-control-lg bg-secondary" name="designation_id">
                                            <option value="" selected="" disabled="">Select Designation</option>
                                            @foreach($designation as $value)
                                                <option value="{{ $value->id }}" {{ ($editData->designation_id == $value->id)? "selected":"" }}>{{ $value->name }}</option>
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
                                            <label for="mobile">Mobile</label>
                                            <input type="text" name="mobile" class="form-control input-default" maxlength="12" value="{{ $editData->mobile }}">
                                            @error('mobile')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control input-default" value="{{ $editData->email }}">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="join_date">Joining Date</label>
                                            <input type="date" name="join_date" class="form-control bg-secondary input-default" min="2011-01-01" value="{{ $editData->join_date}}">
                                            @error('join_date')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control input-default" value="{{ $editData->Address }}">
                                            @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group">
                                          <label for="image">Profile Image</label>
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
                                        <img id="showImage" src="{{url('upload/user_images/'.$editData -> image)}}" class="img-fluid rounded-circle" alt="" style="width:100px;height:100px">
                                        @error('image')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>

                                        <input type="submit" class="btn btn-success" value ="Update Registration">

                                    </form>
                                </div>
                            </div>
                        </div>

            </div>
        </div>


@endsection