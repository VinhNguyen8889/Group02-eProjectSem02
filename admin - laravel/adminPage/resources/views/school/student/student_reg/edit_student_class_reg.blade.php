@extends('admin.admin_master')
@section('admin')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->
                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Registration</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.student_reg')}}"><button type="button" class="btn btn-secondary">Back</button></a>
                    </div>  
                </div>

                    <div class="card-header">   
                    <div class="table-responsive">
                                   
	
<table class="table">
<thead class="thead-dark"> 
<tr role="row">
<th>Student Name</th>
<th>Date of Birth</th>
<th>Gender</th>
<th>Mobile</th>
<th>Email</th>
</thead>
<tbody>
                           
<tr role="row">
<td>{{$transaction->student->name}}</td>
<td>{{$transaction->student->dob}}</td>
<td>{{$transaction->student->gender}}</td>
<td>{{$transaction->student->mobile}}</td>
<td>{{$transaction->student->email}}</td>										
</tr>
</tbody>
</table>


</div>
</div>
<div class="card-body">


<div class="row">

<div class="col-md-4">
<div class="form-group">
<label for="gender">Subject <span class="text-danger">*</span></label>
<select class="form-control bg-secondary" name="subject_id">
<option value="" selected="" disabled="">Please Select <span class="text-danger">*</span></option>
@foreach($subjects as $key=>$subject)
<option value="{{$subject->id}}" {{$subject->id==$transaction->class->subject_id?'selected':''}}>{{$subject->name}}</option>
@endforeach
</select>

@error('category_id') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="class_id">Class <span class="text-danger">*</span></label>
<select class="form-control bg-secondary" name="class_id">
<option value="" selected="" disabled="">Please Select <span class="text-danger">*</span></option>
@foreach($selectedClasses as $key=>$class)
<option value="{{$class->id}}" {{$class->id==$transaction->class_id?'selected':''}}>{{$class->name}}</option>
@endforeach
</select>


@error('reg_class_id') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label for="gender">Voucher </label>
<select class="form-control bg-secondary" name="" id="vouchername">
<option value="0" selected>No Voucher</option>
@foreach($vouchers as $key=>$voucher)
<option value="{{$voucher->id}}" {{$voucher->coupon_name==$transaction->voucher_name?'selected':''}}>{{$voucher->coupon_name}}</option>
@endforeach
</select>
</div>
</div>


</div>
</div>


</div>

<hr>


<table class="table" id="transaction">
<thead class="thead-dark"> 
<tr role="row">
<th>Class Fee</th>
<th>Discount Value</th>
<th>Discount Amount</th>
<th>Grand Total</th>
</tr>
</thead>
<tbody id="transactionDetail">
<tr>
<th>
<div class="form-group mb-0">
<input type="float" value="{{$transaction->class->applied_fee}}" id="fee_amount" name="fee_amount" disabled class="bg bg-primary text-white text-center" size="5">
</div>
</th>
<th>
<div class="form-group mb-0">
<input type="float" value="{{$transaction->value}}" id="discount_value" name="discount_value" disabled class="bg bg-primary text-white text-center" size="5">
</div>
</th>
<th>
<div class="form-group mb-0">
<input type="float" value="{{$transaction->discount_amount}}" id="discount_amount" name="discount_amount"  disabled class="bg bg-primary text-white text-center" size="5">
</div>
</th>
<th>
<div class="form-group mb-0">
<input type="float" value="{{$transaction->paid}}"  name="subtotal" id="subtotal" disabled class="bg bg-primary text-white text-center" size="5">
</div>
</th>
<th>

</th>
</tr>
</tbody>
</table>

<form method="post" action="{{route('update.transaction',$transaction->id)}}" enctype="multipart/form-data">
@csrf
<input type="text" id="reg_student_id" name ="reg_student_id" value="{{$transaction->student->id}}" hidden >

<input type="text" id="reg_class_id" name="reg_class_id" value="{{$transaction->class_id}}" hidden>

<input type="text" id="reg_coupon_name" name="reg_coupon_name" value="{{$transaction->voucher_name}}" hidden >
<input type="float" id="reg_fee_amount" name="reg_fee_amount" value="{{$transaction->class->applied_fee}}"  hidden>
<input type="float" id="reg_value" name="reg_value" value="{{$transaction->value}}" hidden>
<input type="float" id="reg_discount_amount" name="reg_discount_amount" value="{{$transaction->discount_amount}}" hidden>
<input type="float" id="reg_paid" name="reg_paid" value="{{$transaction->paid}}" hidden>
  

<div class="form-group mb-0" id="confirm_btn">
    <p class="text-info"> <strong>Payment Type <span class="text-danger">*</span></strong> </p>
<div class="radio">
<label><input type="radio" value="cash" name="payment" {{$transaction->payment=="cash"?'checked':''}}> Cash</label>
</div>
<div class="radio">
<label><input type="radio" value="transfer" name="payment" {{$transaction->payment=="transfer"?'checked':''}}> Bank Transfer</label>
</div>
<div class="radio disabled">
<label><input type="radio" value="visamaster" name="payment" {{$transaction->payment=="visamaster"?'checked':''}}> Visa/Master </label>
</div>
</div>
@error('payment') 
<span class="text-danger">{{ $message }}</span>
@enderror 
<input type="submit" class="btn btn-success" id="confirm_btn" value="Update">  

</form>

                            </div>
                        </div>

            </div>
        </div>



        <script type="text/javascript">
      $(document).ready(function() {
        // $('#vouchername').hide();
        // $('#confirm_btn').hide();

        $('select[name="subject_id"]').on('change', function(){
            var subject_id = $(this).val();
            $('#vouchername').hide();
            $('#vouchername').val(0);
            $('#reg_coupon_name').val('');
            $('#transactionDetail').html('');
            $('#reg_fee_amount').val('');

            $('#reg_value').val('');
            $('#reg_discount_amount').val('');
            $('#reg_paid').val('');
            $('#confirm_btn').hide();

            if(subject_id) {
                $.ajax({
                    url: "{{  url('/students/reg/student/subject/') }}/"+subject_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="class_id"]').empty();
                       $('#reg_class_id').val('');
                       var s = $('select[name="class_id"]').append('<option value="">Please Select</option>');
                          $.each(data, function(key, value){
                              $('select[name="class_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                          });
                    }
                });
            } else {
                alert('danger');

            }
        });
        

        $('select[name="class_id"]').on('change', function(){
            var class_id = $(this).val();

            if(class_id) {
                $.ajax({
                    url: "{{  url('/students/reg/student/subject/class') }}/"+class_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        // $('#vouchername').removeAttr("hidden");
                        $('#vouchername').show();
                        $('#vouchername').val(0);
                        $('#reg_coupon_name').val('')
                        $('#reg_class_id').val(class_id);
                        $('#reg_value').val('');
                        $('#reg_discount_amount').val('');
                        $('#reg_paid').val(data.applied_fee);
                        $('#reg_fee_amount').val(data.applied_fee);

                        $('#confirm_btn').show();

                        $('#transactionDetail').html(`
                        <tr>
<th>
<div class="form-group mb-0">
<input type="float" value="${data.applied_fee}" id="fee_amount" name="fee_amount" disabled class="bg bg-primary text-white text-center" size="5">
</div>
</th>
<th>
<div class="form-group mb-0">
<input type="float" value="" id="discount_value" name="discount_value" disabled class="bg bg-primary text-white text-center" size="5">
</div>
</th>
<th>
<div class="form-group mb-0">
<input type="float" value="" id="discount_amount" name="discount_amount"  disabled class="bg bg-primary text-white text-center" size="5">
</div>
</th>
<th>
<div class="form-group mb-0">
<input type="float" value="${data.applied_fee}"  name="subtotal" id="subtotal" disabled class="bg bg-primary text-white text-center" size="5">
</div>
</th>
<th>

</th>
</tr>
                        `)
                    }
                });
            } else {
                alert('please select class');
            }
        });

        reg_coupon_name

$('#vouchername').on('change', function(){
var voucher_id = $(this).val();
var fee = $('#fee_amount').val();

$('#reg_coupon_name').val('')

if(voucher_id>0) {
                $.ajax({
                    url: "{{  url('/students/reg/student/subject/class/voucher') }}/"+voucher_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        
                        $('#reg_coupon_name').val(data.coupon_name);

                        if(data.coupon_discount<=1){
                            var discount = data.coupon_discount*fee;
                            var total = fee - discount;
                            var value = "-" + data.coupon_discount*100 +"%";
                        $('#discount_value').val(value);
                        } else {
                            var discount = data.coupon_discount;
                            var total = fee - discount;
                            var value = "-" + discount;
                        $('#discount_value').val(value);
                        }

                        $('#discount_amount').val(discount);
                        $('#subtotal').val(total);

                        $('#reg_value').val(value);
                        $('#reg_discount_amount').val(discount);
                        $('#reg_paid').val(total);
                       
                    }
                });
            } else {
                $('#discount_value').val('');
                $('#discount_amount').val('');
                $('#subtotal').val(fee);
                $('#reg_value').val('');
                $('#reg_discount_amount').val('');
                $('#reg_paid').val(fee);

            }
});






})


</script>


@endsection