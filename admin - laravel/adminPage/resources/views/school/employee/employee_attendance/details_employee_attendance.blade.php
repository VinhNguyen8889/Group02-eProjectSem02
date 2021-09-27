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
                                <h4 class="card-title">Employee Attendance Details</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                                    <a href="{{route('all.employee_attendance')}}"><button type="button" class="btn btn-secondary">Back</button></a>
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
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="ID No: activate to sort column ascending" >ID No</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" >Date</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Attend: activate to sort column ascending" >Attend</th>
</thead>
<tbody>

@foreach($details as $key => $value )                                          
<tr role="row" class="{{$key%2?'even':'odd'}}">
<td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt="">{{ $key+1 }}</td>
<td> {{ $value['user']['name'] }}</td>
<td> {{ $value['user']['id_no'] }}</td>
<td> {{ date('d-m-Y', strtotime($value->date)) }}</td>
<td> {{ $value->attend_status }}</td>												
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