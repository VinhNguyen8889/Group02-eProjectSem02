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
                                <h4 class="card-title">Add Assign Subject</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.assign_subject')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
                    </div>
                            </div>

                            
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('store.assign_subject')}}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label class="info-title">Class</label>
        
                                            <select class="form-control form-control-lg bg-info" name="class_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($classes as $class)
                                                     <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach	 
                                               </select>
                                                @error('class_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                               </div>

                                               <div class="add_item">
                                        <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="info-title"> Subject </label>
                                          
                                                <select class="form-control bg-primary" name="school_subject_id[]">
                                                <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($school_subjects as $subject)
                                                     <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach	 
                                               </select>
                                                @error('school_subject_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror

                                        </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="info-title">Assignment</label>
                                            <input type="number" min="0" name="assignment_mark[]" class="form-control">
                                           
                                        </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="info-title">Ojective</label>
                                            <input type="number" min="0" name="objective_mark[]" class="form-control">
                                            
                                        </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="info-title">Attendance</label>
                                            <input type="number" min="0" name="attendance_mark[]" class="form-control">
                                            
                                        </div>
                                        </div>

                                        <div class="form-group">
                                        <div class="col-md-2" style="padding-top: 25px;">
                                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>    		
                                        </div><!-- End col-md-5 -->
                                        </div>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                        <input type="submit" class="btn btn-success" value ="Add Assign Subject">
                                        </div>

                                    </form>
 

                                
                            </div>
                        </div>

            </div>
        </div>


<!-- add more -->
<div style="visibility:hidden;">
  	<div class="whole_extra_item_add" id="whole_extra_item_add">
  		<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

          <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="info-title"> Subject </label>
                                          
                                                <select class="form-control bg-primary" name="school_subject_id[]">
                                                <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($school_subjects as $subject)
                                                     <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach	 
                                               </select>
                                            

                                        </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="info-title">Assignment</label>
                                            <input type="number" min="0" name="assignment_mark[]" class="form-control">
                                            
                                        </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="info-title">Ojective</label>
                                            <input type="number" min="0" name="objective_mark[]" class="form-control">
                                            
                                        </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="info-title">Attendance</label>
                                            <input type="number" min="0" name="attendance_mark[]" class="form-control">
                                            
                                        </div>
                                        </div>

                                     
                                        <div class="col-md-2" style="padding-top: 25px;">
                                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>       		
                                        </div><!-- End col-md-5 -->
                                 
                                        </div>


        </div>
    </div>
</div>

<!-- end add more -->

<script type="text/javascript">
 	$(document).ready(function(){
 		var counter = 0;
 		$(document).on("click",".addeventmore",function(){
 			var whole_extra_item_add = $('#whole_extra_item_add').html();
 			$(this).closest(".add_item").append(whole_extra_item_add);
 			counter++;
 		});
 		$(document).on("click",'.removeeventmore',function(event){
 			$(this).closest(".delete_whole_extra_item_add").remove();
 			counter -= 1
 		});

 	});
 </script>

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>
<script type="text/javascript">
    $('#summernote1').summernote({
        height: 400
    });
</script>
<script type="text/javascript">
    $('#summernote2').summernote({
        height: 400
    });
</script>
<script type="text/javascript">
    $('#summernote3').summernote({
        height: 400
    });
</script>
<!-- End Summernote Editor  -->
@endsection