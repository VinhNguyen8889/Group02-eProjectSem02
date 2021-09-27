<?php

namespace App\Http\Controllers\School\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryLog;
use App\Models\LevelTeacher;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function EmployeeSalaryAll(){
    	$data['allData'] = User::where('usertype','Employee')->get();
    	return view('school.employee.employee_salary.all_employee_salary',$data);
    }


    public function EmployeeSalaryIncrement($id){
    	$data['editData'] = User::find($id);
		$data['level'] = LevelTeacher::all();
    	return view('school.employee.employee_salary.add_employee_salary',$data);

    }

    public function EmployeeSalaryStore(Request $request, $id){
		$validatedData = $request->validate([
			'increment_salary' => 'required',
			'effected_salary' => 'required'
		]);
		$level = LevelTeacher::where('increment_salary',$request->increment_salary)->first();
    	$user = User::find($id);
    	$previous_salary = $user->salary;
    	$present_salary = (float)$previous_salary+(float)$request->increment_salary; 
    	$user->religion = $level->name;
    	$user->save();

    	$salaryData = new EmployeeSalaryLog();
    	$salaryData->employee_id = $id;
    	$salaryData->previous_salary = $previous_salary;
    	$salaryData->increment_salary = $request->increment_salary;
    	$salaryData->present_salary = $present_salary;
    	$salaryData->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
    	$salaryData->save();

    	$notification = array(
    		'message' => 'Employee Salary Increment Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.employee_salary')->with($notification);

    }


    public function EmployeeSalaryDetails($id){
    	$data['details'] = User::find($id);
    	$data['salary_log'] = EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();
    	//dd($data['salary_log']->toArray());
    	return view('school.employee.employee_salary.details_employee_salary',$data);

    }
}
