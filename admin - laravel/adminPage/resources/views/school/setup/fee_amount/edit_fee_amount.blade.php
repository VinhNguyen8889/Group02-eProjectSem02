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
                                <h4 class="card-title">Add Fee Category</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.fee_amount')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
                    </div>
                            </div>

                            
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('update.fee_amount',$editData['0']->fee_category_id)}}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label class="info-title">Fee Category</label>
        
                                            <select class="form-control form-control-lg bg-info" name="fee_category_id">
                                            <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($fee_categories as $category)
                                                     <option value="{{ $category->id }}" {{ ($editData['0']->fee_category_id == $category->id)? "selected":"" }}>{{ $category->name }}</option>
                                                @endforeach	 
                                               </select>

                                               </div>

                                               <div class="add_item">
                                               
                                               @foreach($editData as $data)
                                               <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                        <div class="row">
                                        <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="info-title"> Class </label>
                                          
                                                <select class="form-control bg-primary" name="class_id[]">
                                                <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($classes as $class)
                                                     <option value="{{ $class->id }}" {{$data->class_id == $class->id? 'selected':''}}>{{ $class->name }}</option>
                                                @endforeach	 
                                               </select>
                                            

                                        </div>
                                        </div>

                                        <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="info-title">Fee Amount</label>
                                            <input type="number" min="0" name="amount[]" class="form-control" value="{{$data->amount}}">
                                        </div>
                                        </div>

                                     
                                        <div class="col-md-2" style="padding-top: 25px;">
                                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>    
                                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>		
                                        </div><!-- End col-md-5 -->
                        
                                        </div>
                                        </div>
                                        @endforeach	


                                        </div>

                                        <div class="form-group">
                                        <input type="submit" class="btn btn-success" value ="Update Fee Amount">
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
                                        <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="info-title"> Class </label>
                                          
                                                <select class="form-control bg-primary" name="class_id[]">
                                                <option value="" selected="" disabled="">Please Select</option>
                                                @foreach($classes as $class)
                                                     <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach	 
                                               </select>
                                            

                                        </div>
                                        </div>

                                        <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="info-title">Fee Amount</label>
                                            <input type="number" min="0" name="amount[]" class="form-control">
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