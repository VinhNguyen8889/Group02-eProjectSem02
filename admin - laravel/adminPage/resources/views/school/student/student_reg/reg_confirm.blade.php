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


<a href="{{route('all.student_reg')}}" class="btn btn-success">Professional Programming for Everyone</a>
<p>
101 Bui Vien, Ward 15 District 01, HCMC - Phone: 0912345678 - Email : support@pp4e.com
   
</p>


<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student Name</b></td>
    <td>{{$detail['student']['name']}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Student ID No</b></td>
    <td>{{$detail['student']['id_no']}}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Student Class</b></td>
    <td>{{$detail['class']['name']}}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Fee Amount</b></td>
    <td>{{$detail->fee_amount}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Discount</b></td>
    <td>{{$detail->discount_amount}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Subtotal </b></td>
    <td>{{$detail->paid}}</td>
  </tr>

  <tr>
    <td>3</td>
    <td><b>Enrolnment Date</b></td>
    <td>{{$detail->created_at}}</td>
  </tr>
</table>
<br> <br>


 
</body>
</html>
