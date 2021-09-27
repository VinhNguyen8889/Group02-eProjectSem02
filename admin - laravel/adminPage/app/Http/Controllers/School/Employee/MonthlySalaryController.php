<?php

namespace App\Http\Controllers\School\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\EmployeeSalaryLog;
use App\Models\StudentClass;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonthlySalaryController extends Controller
{
    public function GetMonthlySalary(){
        return view('school.employee.employee_monthly_salary.get_monthly_salary');
    }

    public function DetailsMonthlySalary(Request $request){
        $month = $request -> month;
        $id_no = $request -> id_no;
        $month_carbon = new Carbon($month);
        $where[]=['date','like',$month.'%'];
        $countDaysInMonth = $month_carbon->daysInMonth;
        $checkMonth = EmployeeAttendance::where($where) -> get();
        $user = User::where('id_no',$id_no)->first();
        if($month == '' || $id_no == '' || $user == '' || $checkMonth == '[]'){
            return view('school.employee.employee_monthly_salary.get_monthly_salary');
        }else{


        $totalattend = EmployeeAttendance::where($where)->where('employee_id',$user->id)->get();    
        $absentCount = count($totalattend->where('attend_status','Absent'));
        $salary_log = EmployeeSalaryLog::where('employee_id',$user->id)->orderBy('id','desc')->first();
        $teacher_class = StudentClass::where('teacher_id',$user->id)->where('planned_start_date','like',$month.'%')->get();
        $classCount = count($teacher_class);
        $allowance_salary = (integer)$classCount * 500;
        $absent_salary = $absentCount * (($user->salary)/(integer)$countDaysInMonth);
        $total_salary = $salary_log->present_salary + $allowance_salary - $absent_salary;
        return view('school.employee.employee_monthly_salary.details_monthly_salary',['user'=>$user,
                                                                                        'absentCount'=>$absentCount,
                                                                                        'month'=>$month,
                                                                                        'total_salary'=>$total_salary,
                                                                                        'salary_log'=>$salary_log,
                                                                                        'allowance_salary'=>$allowance_salary,
                                                                                        ]);
        }
    }
}
