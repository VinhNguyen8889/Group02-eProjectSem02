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
                                <h4 class="card-title">Subject Database</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('add.subject')}}"><button type="button" class="btn btn-secondary">Add Subject</button></a>
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
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Short Code</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Total Session</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Latest Fee Amount</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Effective Date</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Action</th>
</thead>
<tbody>

@foreach($allData as $key => $subject )                                           
<tr role="row" class="{{$key%2?'even':'odd'}}">
<td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt="">{{ $key+1 }}</td>
<td>{{ $subject->name }}</td>
<td>{{ $subject->short_code }}</td>
<td>{{ $subject->total_session }}</td>
<td>{{ $subject['fee_detail']['fee_amount'] }}</td>
<td>{{ $subject['fee_detail']['effective_date'] }}</td>
<td>
<div class="d-flex">
<a href="{{route('edit.subject',$subject->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
<a href="{{route('delete.subject',$subject->id)}}" class="btn btn-danger shadow btn-xs sharp" id="delete"><i class="fa fa-trash"></i></a>
<a href="{{route('all.subject_fee',$subject->id)}}" class="btn btn-info shadow btn-xs sharp" id=""><i class="fa fa-money"></i></a>
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