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
                                <h4 class="card-title">Fee Logs - {{$subject->name}}</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a class="m-2" href="{{route('add.subject_fee', $subject->id)}}"><button type="button" class="btn btn-info">Add New Fee Amount</button></a>
                            <a class="m-2" href="{{route('all.subject')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
                        </div>
                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="example3_wrapper" class="dataTables_wrapper no-footer">

                                            <table id="example3" class="display dataTable no-footer" style="min-width: 845px" role="grid" aria-describedby="example3_info">
<thead> 
<tr role="row" class="bg bg-success">
<th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" >#</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Fee Amount</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Effective Date</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Action</th>
</thead>
<tbody>

@foreach($fee_amounts as $key => $amount )                                           
<tr role="row" class="{{$key%2?'even':'odd'}}">
<td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt="">{{ $key+1 }}</td>
<td>{{ $amount->fee_amount }}</td>
<td>{{ $amount->effective_date }}</td>
<td>
<div class="d-flex">
<a href="{{route('edit.subject_fee',$amount->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
<a href="{{route('delete.subject_fee',$amount->id)}}" class="btn btn-danger shadow btn-xs sharp" id="delete"><i class="fa fa-trash"></i></a>
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