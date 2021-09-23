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
                                <h4 class="card-title">Class List</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="example3_wrapper" class="dataTables_wrapper no-footer">
	
                                            <table id="example3" class="display dataTable no-footer" style="min-width: 845px" role="grid" aria-describedby="example3_info">
<thead> 
<tr role="row" class="bg bg-success">
<th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" >#</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Name</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Subject</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Study Day</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Shift</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Planned Start Day</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Teacher</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Action</th>
</thead>
<tbody>

@foreach($classes as $key=>$class)                             
<tr role="row">
<td>{{$key+1}}</td>
<td>{{$class->name}}</td>
<td>{{$class['class_subject']['name']}}</td>
<td>{{$class['class_day']['name']}}</td>
<td>{{$class['class_shift']['name']}}</td>
<td>{{$class->planned_start_date}}</td>
<td>{{$class['class_teacher']['name']}}</td>


<td>
<div class="d-flex">
<a href="{{route('detail.class_list',$class->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="flaticon-057-eye"></i></a>
@if(Auth::user()->role == 'Teacher')
<a href="{{route('add.mark',$class->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="flaticon-131-scale"></i></a>
@endif
</div>												
</td>												
</tr>
@endforeach

</tbody>
</table>

                                    <div class="dataTables_paginate paging_simple_numbers" id="example3_paginate">
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
               
<!-- page div -->
            </div>
        </div>







@endsection