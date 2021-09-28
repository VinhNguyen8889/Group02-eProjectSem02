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
    <th>Student Name</th>
    <th>Student DOB</th>
    <th>Student Email</th>
    <th>Student Mobile</th>
    <th>Student Mark</th>
  </tr>

  @foreach($students as $key=>$each)
  <tr>
    <td>{{$key+1}}</td>
    <td>{{$each->student->name}}</td>
    <td>{{$each->student->dob}}</td>
    <td>{{$each->student->email}}</td>
    <td>{{$each->student->mobile}}</td>
    <td>{{$each->mark}}</td>
  </tr>
@endforeach


</table>

 
</body>
</html>
