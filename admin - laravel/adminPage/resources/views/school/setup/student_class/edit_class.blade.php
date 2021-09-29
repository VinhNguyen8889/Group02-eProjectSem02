@extends('admin.admin_master')

@section('summernote')
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection


@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">

                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Class Info</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.class')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="GET" action="{{route('regenerate.class',$class_id)}}">
                                        @csrf
                                        <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="year">Year <span class="text-danger">*</span></label>
                                            <select class="form-control form-control-lg bg-secondary" name="year_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($years as $year)
                                                     <option value="{{ $year->id }}" {{$year->id==$year_id?'selected':''}}>{{ $year->name }}</option>
                                                @endforeach	 
                                               </select>
                                               @error('year_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="class">Day <span class="text-danger">*</span></label>
                                            <select class="form-control form-control-lg bg-secondary" name="day_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($days as $day)
                                                     <option value="{{ $day->id }}" {{$day->id==$day_id?'selected':''}}>{{ $day->name }}</option>
                                                @endforeach	 
                                               </select>
                                               @error('day_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="class">Shift <span class="text-danger">*</span></label>
                                            <select class="form-control form-control-lg bg-secondary" name="shift_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($shifts as $shift)
                                                     <option value="{{ $shift->id }}" {{$shift->id==$shift_id?'selected':''}}>{{ $shift->name }}</option>
                                                @endforeach	 
                                               </select>
                                               @error('shift_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Group <span class="text-danger">*</span></label>
                                            <select class="form-control form-control-lg bg-secondary" name="group_id">
                                            <option value="" selected="" disabled="">Please Select <span class="text-danger">*</span></option>
                                                @foreach($groups as $group)
                                                     <option value="{{ $group->id }}" {{$group->id==$group_id?'selected':''}}>{{ $group->name }}</option>
                                                @endforeach	 
                                               </select>
                                               @error('group_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="shift">Subject <span class="text-danger">*</span></label>
                                            <select class="form-control form-control-lg bg-secondary" name="subject_id">
                                            <option value="" selected="" disabled="">Please Select <span class="text-danger">*</span></option>
                                                @foreach($subjects as $subject)
                                                     <option value="{{ $subject->id }}" {{$subject->id==$subject_id?'selected':''}}>{{ $subject->name }}</option>
                                                @endforeach	 
                                               </select>
                                               @error('subject_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="shift">Teacher</label>
                                            <select class="form-control form-control-lg bg-secondary" name="teacher_id">
                                            <option value="0" selected="" disabled="">Please Select</option>
                                                @foreach($teachers as $teacher)
                                                     <option value="{{ $teacher->id }}" {{$teacher->id==$teacher_id?'selected':''}}>{{ $teacher->name }}</option>
                                                @endforeach	 
                                               </select>
                                        </div>
                                        </div>
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group">
                                            <label class="info-title">Effective Date <span class="text-danger">*</span></label>
                                            <input type="date" name="effective_date" class="form-control bg-secondary input-default" value="{{$planned_start_date}}">
                                            @error('effective_date')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-md-8 p-md-1 justify-content-sm-end mt-md-4 mt-sm-0 d-flex">
                                    
                                        <input type="submit" class="btn btn-warning" name="search" value ="Re-generate Class">
                                
                                        </div>
                                        

                                    </form>
                                </div>
                                </div>

                                <h4 class="card-title">Class Generation</h4>
                                <div class="basic-form">
                                    <form method="POST" action="{{route('update.class', $class_id)}}">
                                        @csrf
                
@if(!@search)
<div class="row">     
                                <input type="hidden" name="gen_year_id" value="{{$year_id}}">
                                <input type="hidden" name="gen_group_id" value="{{$group_id}}">
                                <input type="hidden" name="gen_day_id" value="{{$day_id}}">
                                <input type="hidden" name="gen_subject_id" value="{{$subject_id}}">
                                <input type="hidden" name="gen_shift_id" value="{{$shift_id}}">
                                <input type="hidden" name="gen_planned_start_date" value="{{$planned_start_date}}">
                                <input type="hidden" name="gen_applied_fee" value="{{$gen_fee}}">
                                <input type="hidden" name="gen_class" value="{{$class_name}}">
                                <input type="hidden" name="gen_teacher_id" value="{{$teacher_id}}">
                            

                                
                                <div class="col-md-4">
                              
                                            <label class="info-title">Class Name</label>
                                            <input type="text" name="gen_class_name" class="form-control input-default" placeholder="{{$class_name}}" value="{{$class_name}}" disabled>
                                            @error('gen_class')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                </div>
                        
                                <div class="col-md-4">
                                <div class="form-group">
                                            <label class="info-title">Teacher</label>
                                            <input type="text" name="gen_teacher" class="form-control input-default" placeholder="{{$gen_teacher}}" value="{{$gen_teacher}}" disabled>
                                </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                            <label class="info-title">Fee</label>
                                            <input type="text" name="gen_fee" class="form-control input-default" placeholder="{{$gen_fee}}" value="{{$gen_fee}}" disabled>
                                </div>
                                </div>

                                </div>
                                <input type="submit" class="{{$button}}" value ="Create New Class"  {{$disabled}}>

@else
<div class="row">

                                <input type="hidden" name="gen_year_id" value="{{$year_id}}">
                                <input type="hidden" name="gen_group_id" value="{{$group_id}}">
                                <input type="hidden" name="gen_day_id" value="{{$day_id}}">
                                <input type="hidden" name="gen_subject_id" value="{{$subject_id}}">
                                <input type="hidden" name="gen_shift_id" value="{{$shift_id}}">
                                <input type="hidden" name="gen_planned_start_date" value="{{$planned_start_date}}">
                                <input type="hidden" name="gen_applied_fee" value="{{$gen_fee}}">
                                <input type="hidden" name="gen_class" value="{{$class_name}}">
                                <input type="hidden" name="gen_teacher_id" value="{{$teacher_id}}">
                                

                                <div class="col-md-4">
                              
                                            <label class="info-title">Class Name</label>
                                            <input type="text" name="gen_class_name" class="form-control input-default" placeholder="{{$class_name}}" value="{{$class_name}}" disabled>
                                            @error('gen_class')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                </div>
                          
                                <div class="col-md-4">
                                <div class="form-group">
                                            <label class="info-title">Teacher</label>
                                            <input type="text" name="gen_teacher" class="form-control input-default" placeholder="{{$gen_teacher}}" value="{{$gen_teacher}}" disabled>
                                </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                            <label class="info-title">Fee</label>
                                            <input type="text" name="gen_fee" class="form-control input-default" placeholder="{{$gen_fee}}" value="{{$gen_fee}}" disabled>
                                </div>
                                </div>


                                </div>

                                <input type="submit" class="{{$button}}" value ="Update Class" {{$disabled}}>

@endif
</form>
                                    </div>
                            </div>
                        </div>

            </div>


@endsection