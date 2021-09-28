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
    <th>Class Name</th>
    <th>Group</th>
    <th>Subject</th>
    <th>Study Day</th>
    <th>Shift</th>
    <th>Planned Start Day</th>
    <th>Teacher</th>
    <th>Applied Fee</th>
  </tr>

  @foreach($classes as $key=>$class)
  <tr>
    <th>{{$key+1}}</th>
    <th>{{$class->name}}</th>
    <th>{{$class->class_group->name}}</th>
    <th>{{$class->class_subject->name}}</th>
    <th>{{$class->class_day->name}}</th>
    <th>{{$class->class_shift->name}}</th>
    <th>{{$class->planned_start_date}}</th>
    <th>{{$class->class_teacher->name}}</th>
    <th>{{$class->applied_fee}}</th>
  </tr>
@endforeach


</table>

 
</body>
</html>
