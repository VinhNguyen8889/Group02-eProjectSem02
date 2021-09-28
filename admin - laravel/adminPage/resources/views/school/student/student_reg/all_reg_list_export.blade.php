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
    <th>DOB</th>
    <th>Gender</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Student ID</th>
  </tr>

  @foreach($students as $key=>$student)
  <tr>
    <th>{{$key+1}}</th>
    <th>{{$student->name}}</th>
    <th>{{$student->dob}}</th>
    <th>{{$student->gender}}</th>
    <th>{{$student->mobile}}</th>
    <th>{{$student->email}}</th>
    <th>{{$student->id_no}}</th>
   
  </tr>
@endforeach


</table>

 
</body>
</html>
