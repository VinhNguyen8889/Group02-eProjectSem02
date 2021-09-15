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
                            <a href="{{route('all.student_reg')}}"><button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('update.student_reg', $editData->student_id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $editData->id }}">
                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Student Name</label>
                                            <input type="text" name="name" class="form-control input-default" value="{{ $editData['student']['name'] }}">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fname">Father Name</label>
                                            <input type="text" name="fname" class="form-control input-default" value="{{ $editData['student']['fname'] }}">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mname">Mother Name</label>
                                            <input type="text" name="mname" class="form-control input-default" value="{{ $editData['student']['mname'] }}">
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control form-control-lg bg-secondary" name="gender">
                                            <option value="" selected="" disabled="">Select Gender</option>
                                            <option value="Male" {{ ($editData['student']['gender'] == 'Male')? 'selected':'' }}>Male</option>
                                            <option value="Female" {{ ($editData['student']['gender'] == 'Female')? 'selected':'' }}>Female</option>
			 
                                               </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob">DOB</label>
                                            <input type="date" name="dob" class="form-control bg-secondary input-default" value="{{ $editData['student']['dob'] }}">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" name="mobile" class="form-control input-default" value="{{ $editData['student']['mobile'] }}">
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control input-default" value="{{ $editData['student']['address'] }}">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <select class="form-control form-control-lg bg-secondary" name="year_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($years as $year)
                                                <option value="{{ $year->id }}" {{($editData->year_id == $year->id)?'selected':'' }} >{{ $year->name }}</option>
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
                                                <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id)?'selected':"" }} >{{ $class->name }}</option>
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
                                                <option value="{{ $group->id }}" {{ ($editData->group_id == $group->id)?'selected':"" }} >{{ $group->name }}</option>
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
                                                <option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id)?'selected':"" }} >{{ $shift->name }}</option>
                                                @endforeach	 
                                               </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="discount">Discount</label>
                                            <input type="text" name="discount" class="form-control input-default" value="{{ $editData['discount']['discount'] }}">
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">

                                        <div class="col-md-4">
                                        <label for="gender">Profile Image</label>
                                        <img id="showImage" src="{{(!empty($editData['student']['profile_photo_path']))?url('upload/student_images/'.$editData['student']['profile_photo_path']):url('upload/no_image.jpg')}}" class="img-fluid rounded-circle" alt="" style="width:100px;height:100px">
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