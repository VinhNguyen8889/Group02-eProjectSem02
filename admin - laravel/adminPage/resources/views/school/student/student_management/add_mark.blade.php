@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->

                <!-- row -->


<!-- end row -->
            <div class="row">

            <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> <strong>Class:</strong> <span class="text-info">{{$class->name}}</span> </h4>
                                <h5 class="card-title"><strong>Teacher:</strong> <span class="text-info">{{$class['class_teacher']['name']}}</span></h5>

                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('detail.class_list',$class->id)}}"><button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="example3_wrapper" class="dataTables_wrapper no-footer">
	
                                            <table id="example3" class="display dataTable no-footer" style="min-width: 845px" role="grid" aria-describedby="example3_info">
<thead> 
<tr role="row" class="bg bg-success">
<th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" >#</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Student Name</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >DOB</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Mobile</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Email</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Mark</th>
</thead>
<form method="post" action="{{ route('store.mark',$class->id) }}">
	 	@csrf
@foreach($students as $key=>$student)   
<tbody>                   
<tr role="row">
<td>{{$key+1}}</td>
<td>{{$student['student']['name']}}</td>
<td>{{$student['student']['dob']}}</td>
<td>{{$student['student']['mobile']}}</td>
<td>{{$student['student']['email']}}</td>
<td>
    <input type="text" name="mark[]" value="{{$student->mark}}">
</td>
<td>
												
</td>												
</tr>
<input type="text" name="student_id[]" value="{{$student->id}}" hidden>
@endforeach
</tbody>

</table>

                                    <div class="dataTables_paginate paging_simple_numbers" id="example3_paginate">
                                </div>
                            </div>
                                </div>

<input type="submit" class="btn btn-success" value="Submit Mark">
</form>
                            </div>
                        </div>
                    </div>


            </div>
               
<!-- page div -->
            </div>
        </div>







@endsection