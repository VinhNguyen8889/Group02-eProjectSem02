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
                                <h4 class="card-title">Transaction List</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('export.transaction')}}"><button type="button" class="btn btn-primary">Export</button></a>
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
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Enrolment Date</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Class</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Voucher Name</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Paid</th>
@if(Auth::user()->usertype =="Admin")
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Action</th>
@endif
</thead>
<tbody>
                         
@foreach($regs as $key=>$reg)                             
<tr role="row">
<td>{{$reg['id_no']}}</td>
<td>{{$reg['student']['name']}}</td>
<td>{{date('Y-m-d',strtotime($reg->created_at))}}</td>
<td>{{$reg['class']['name']}}</td>
<td>{{$reg->voucher_name}}</td>
<td>{{$reg->paid}}</td>

@if(Auth::user()->usertype =="Admin")
<td>
<div class="d-flex">
<a href="{{route('delete.transaction',$reg->id)}}" class="btn btn-danger shadow btn-xs sharp mr-1" id="delete"><i class="fa fa-trash"></i></a>
<a href="{{route('edit.transaction',$reg->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>

</div>												
</td>	
@endif											
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