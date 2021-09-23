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
                                <h4 class="card-title">Student List</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('add.student_reg')}}"><button type="button" class="btn btn-secondary">New Student</button></a>
                    </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="example3_wrapper" class="dataTables_wrapper no-footer">
	
                                            <table id="example3" class="display dataTable no-footer" style="min-width: 845px" role="grid" aria-describedby="example3_info">
<thead> 
<tr role="row" class="bg bg-success">
<th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" >#</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Name</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >DOB</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Gender</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Mobile</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Email</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Student ID</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Action</th>
</thead>
<tbody>

@foreach($students as $key=>$student)                             
<tr role="row">
<td>{{$key+1}}</td>
<td>{{$student->name}}</td>
<td>{{$student->dob}}</td>
<td>{{$student->gender}}</td>
<td>{{$student->mobile}}</td>
<td>{{$student->email}}</td>
<td>{{$student->id_no}}</td>
<td>
<div class="d-flex">
<a href="{{route('edit.student_reg',$student->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
<a href="{{route('delete.student_reg',$student->id)}}" class="btn btn-danger shadow btn-xs sharp mr-1" id="delete"><i class="fa fa-trash"></i></a>
<a href="{{route('add.student_class_reg',$student->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="flaticon-043-plus"></i></a>
<a href="{{route('view.student_class_list',$student->id)}}" class="btn btn-success shadow btn-xs sharp"><i class="flaticon-057-eye"></i></a>

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