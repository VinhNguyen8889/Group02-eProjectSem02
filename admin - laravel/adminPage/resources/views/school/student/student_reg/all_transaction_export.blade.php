<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>


<table id="customers">
  <tr>
    <th>Sl</th>
    <th>Invoice #</th>
    <th>Transaction Day</th>
    <th>Payment Type</th>
    <th>Subtotal Amount</th>
    <th>Class Fee Amount</th>
    <th>Voucher Name</th>
    <th>Voucher Amount</th>
    <th>Discount Amount</th>
    <th>Student Name</th>
    <th>Class Name</th>
  </tr>

  @foreach($regs as $key=>$reg)
  <tr>
    <th>{{$key+1}}</th>
    <th>{{$reg->id_no}}</th>
    <th>{{$reg->created_at}}</th>
    <th>{{$reg->payment}}</th>
    <th>{{$reg->paid}}</th>
    <th>{{$reg->fee_amount}}</th>
    <th>{{$reg->voucher_name}}</th>
    <th>{{$reg->value}}</th>
    <th>{{$reg->discount_amount}}</th>
    <th>{{$reg->student->name}}</th>
    <th>{{$reg->class->name}}</th>
  </tr>
@endforeach


</table>

 
</body>
</html>
