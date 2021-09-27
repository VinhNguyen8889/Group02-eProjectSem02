@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
	<div class="container-fluid">
		<!-- Add Project -->
        <!-- row -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Attendace</h4>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <a href="{{route('all.employee_attendance')}}"><button type="button" class="btn btn-secondary">Back</button></a>
                </div>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="{{ route('update.employee_attendance',$date->date) }}">
	 	            @csrf

                                <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label for="date">Attendance Date <span class="text-danger">*</span></label>
                                    <h4><div class="input-default">{{$date -> date}}</div></h4>
                                </div>
                                </div>  <!-- // End Col md 6 -->   	
                                </div> <!-- // end Row  -->

                                <div class="row">
   	                            <div class="col-md-12">
   		                        <table class="table table-bordered table-striped" style="width: 100%">
   			                        <thead>
   				                        <tr>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                            <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Attendance Status</th>				
   				                        </tr>

                                        <tr>
                                            <th class="text-center bg-success" style="display: table-cell;">Present</th>
                                            <th class="text-center bg-success" style="display: table-cell;">Leave</th>
                                            <th class="text-center bg-success" style="display: table-cell;">Absent</th>
                                        </tr>   				
   			                        </thead>
   			                        <tbody>
                                        @foreach($editData as $key => $data)		

                                        <tr id="div{{$data->id}}" class="text-center">
                                            <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">
                                            <td>{{ $key+1  }}</td>
                                            <td>{{ $data['user']['name'] }}</td>

                                            <td colspan="3">
                                                <div class="switch-toggle switch-3 switch-candy">

                                                <input name="attend_status{{$key}}" type="radio" value="Present" id="present{{$key}}" checked="checked" {{ ($data->attend_status == 'Present')?'checked':'' }} >
                                                <label for="present{{$key}}">Present</label>

                                                <input name="attend_status{{$key}}" value="Leave" type="radio" id="leave{{$key}}"  {{ ($data->attend_status == 'Leave')?'checked':'' }}  >
                                                <label for="leave{{$key}}">Leave</label>

                                                <input name="attend_status{{$key}}" value="Absent"  type="radio" id="absent{{$key}}"  {{ ($data->attend_status == 'Absent')?'checked':'' }}  >
                                                <label for="absent{{$key}}">Absent</label>
                                                
                                                </div>			
                                            </td>
                                        </tr>			

                                        @endforeach
                                    </tbody>   			
   		                        </table>
 
   	                            </div>   <!-- // End Col md 12 -->	
                                </div> <!-- // end Row  -->

						        <input type="submit" class="btn btn-success" value ="Submit">   
					</form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection