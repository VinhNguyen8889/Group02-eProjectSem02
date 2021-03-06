@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->

                <!-- row -->


<!-- end row -->
            <div class="row">

            <div class="col-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Coupon Database</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="example3_wrapper" class="dataTables_wrapper no-footer">

                                            <table id="example3" class="display dataTable no-footer table-dark" style="min-width: 845px" role="grid" aria-describedby="example3_info">
<thead> 
<tr role="row" class="bg bg-info">
<th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" >#</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Name</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Value</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Valid From</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Valid To</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Status</th>
<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" >Action</th>
</tr></thead>
<tbody>

@foreach($coupons as $key=>$coupon)                                     
<tr role="row" class="">
<td class="sorting_1">{{$key+1}}</td>
<td>{{$coupon->coupon_name}}</td>
@if($coupon->coupon_type=="value")
<td>{{$coupon->coupon_discount}}</td>
@else
<td>{{$coupon->coupon_discount*100}}%</td>
@endif
<td>{{$coupon->valid_from}}</td>
<td>{{$coupon->valid_to}}</td>
<td>
@if($coupon->status==0)
		 	<span class="badge badge-pill badge-dark"> Invalid </span>
		 	@elseif($coupon->valid_to <= $today)
           <span class="badge badge-pill badge-danger"> Expired </span>
           @elseif($coupon->valid_from > $today)
           <span class="badge badge-pill badge-primary"> Not started </span>
           @else
           <span class="badge badge-pill badge-success"> Valid </span>
		 	@endif
</td>

<td>
<div class="d-flex">
<a href="{{route('edit.coupon',$coupon->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
<a href="{{route('delete.coupon',$coupon->id)}}" class="btn btn-danger shadow btn-xs sharp" id="delete"><i class="fa fa-trash"></i></a>
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

                    <div class="col-3">
                    <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Coupon</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('update.coupon',$editCoupon->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="info-title">Coupon Name <span class="text-danger">*</span></label>
                                            <input type="text" name="coupon_name" class="input-group input-group-sm bg bg bg-secondary" value="{{$editCoupon->coupon_name}}">
                                            @error('coupon_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Coupon Type <span class="text-danger">*</span></label>
                                            <select class="input-group input-group-sm bg-secondary" name="coupon_type">
                                            <option value="" selected="" disabled="">Please Select</option>
                                            <option value="value" {{$editCoupon->coupon_type=='value'?"selected":""}}>Value</option>
                                            <option value="percent" {{$editCoupon->coupon_type=='percent'?"selected":""}}>Percent</option>
                                            </select>                                           
                                             @error('coupon_type')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Amount <span class="text-danger">*</span></label>
                                            @if($editCoupon->coupon_type=="value")
                                            <input type="text" name="coupon_discount" class="input-group input-group-sm bg bg-secondary" value="{{$editCoupon->coupon_discount}}">
                                            @else
                                            <input type="text" name="coupon_discount" class="input-group input-group-sm bg bg-secondary" value="{{$editCoupon->coupon_discount*100}}">
                                            @endif
                                            
                                            @error('coupon_discount')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Valid From <span class="text-danger">*</span></label>
                                            <input type="date" name="valid_from" class="input-group input-group-sm bg bg-secondary" value="{{$editCoupon->valid_from}}">
                                            @error('valid_from')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Valid To <span class="text-danger">*</span></label>
                                            <input type="date" name="valid_to" class="input-group input-group-sm bg bg-secondary" value="{{$editCoupon->valid_to}}">
                                            @error('valid_to')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Status <span class="text-danger">*</span></label>
                                            <select class="input-group input-group-sm bg-secondary" name="status">
                                            <option value="" selected="" disabled="">Please Select</option>
                                            <option value="1" {{$editCoupon->status==1?"selected":""}}>Active</option>
                                            <option value="0" {{$editCoupon->status==0?"selected":""}}>Inactive</option>
                                            </select>                                           
                                        </div>

                                        <input type="submit" class="btn btn-success btn-sm" value ="Update Coupon">

                                    </form>
                                </div>
                            </div>
                        </div>
       
                    </div>


            </div>
               
<!-- page div -->
            </div>
        </div>







@endsection