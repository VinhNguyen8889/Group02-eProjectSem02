<?php

namespace App\Http\Controllers\School\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function EmployeeAttendanceAll(){
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('date','ASC')->get();
    	// $data['allData'] = EmployeeAttendance::orderBy('id','DESC')->get();
    	return view('school.employee.employee_attendance.all_employee_attendance',$data);
    }


    public function EmployeeAttendanceAdd(){
		$today = Carbon::now()->toDateString();
    	$employees = User::where('usertype','Employee')->get();
		$data = EmployeeAttendance::select('date')->where('date',$today)->groupBy('date')->get();
		if($data!='null'){
			return redirect()->route('edit.employee_attendance',$today);
			
		}else{
			return view('school.employee.employee_attendance.add_employee_attendance',['employees'=>$employees,'today'=>$today]);
		}
    	
    }


    public function EmployeeAttendanceStore(Request $request){
		$today = Carbon::now()->toDateString();
    	$countemployee = count($request->employee_id);
    	for ($i=0; $i <$countemployee ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new EmployeeAttendance();
    		$attend->date = $today;
    		$attend->employee_id = $request->employee_id[$i];
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Employee Attendace Data Update Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.employee_attendance')->with($notification);

    } // end Method



    public function EmployeeAttendanceEdit($date){
		$data['date'] = EmployeeAttendance::where('date',$date)->first();
    	$data['editData'] = EmployeeAttendance::where('date',$date)->get();
    	$data['employees'] = User::where('usertype','employee')->get();
    	return view('school.employee.employee_attendance.edit_employee_attendance',$data);
    }

	public function EmployeeAttendanceUpdate(Request $request,$date){
		EmployeeAttendance::where('date', $date)->delete();
    	$countemployee = count($request->employee_id);
    	for ($i=0; $i <$countemployee ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new EmployeeAttendance();
			$attend->date=$date;
    		$attend->employee_id = $request->employee_id[$i];
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Employee Attendace Data Update Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.employee_attendance')->with($notification);

    } // end Method

    public function EmployeeAttendanceDetails($date){
    	$data['details'] = EmployeeAttendance::where('date',$date)->get();
    	return view('school.employee.employee_attendance.details_employee_attendance',$data);

    }
}
