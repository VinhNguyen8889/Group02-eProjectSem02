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
        $teacher_class = StudentClass::where('teacher_id',$user->id)->where('planned_start_date','like',$month.'%')->get();
        $classCount = count($teacher_class);
        $checkValue = EmployeeSalaryLog::where('employee_id',$user->id)->where('effected_salary','like',$month.'%')->get();
        if($checkValue == '[]'){
            //Case: Level Salary has been updated in this month
            $employee_salary_log = EmployeeSalaryLog::where('employee_id',$user->id)->orderBy('id','desc')->first();
            $level_salary = $employee_salary_log -> increment_salary;
        }else{
            $employee_salary_log_1 = EmployeeSalaryLog::where('employee_id',$user->id)->orderBy('id','desc')->first();
            $employee_salary_log_2 = EmployeeSalaryLog::where('employee_id',$user->id)->orderBy('id','desc')->skip(1)->first();
            $effected_date = new Carbon($employee_salary_log_1 -> effected_salary);
            $level_salary_1_perday = ($employee_salary_log_1 -> increment_salary)/$countDaysInMonth;
            $level_salary_2_perday = ($employee_salary_log_2 -> increment_salary)/$countDaysInMonth;
            $countDays1 = $countDaysInMonth - (integer)($effected_date->day) + 1;
            $countDays2 = (integer)($effected_date->day) - 1;
            $level_salary =(integer)(($level_salary_1_perday * $countDays1) + ($level_salary_2_perday * $countDays2));
        }

        $allowance_salary = (integer)$classCount * 500;
        $absent_salary = $absentCount * (($user->salary)/(integer)$countDaysInMonth);
        $total_salary = $user->salary + $level_salary + $allowance_salary - (integer)$absent_salary;
        return view('school.employee.employee_monthly_salary.details_monthly_salary',['user'=>$user,
                                                                                        'absentCount'=>$absentCount,
                                                                                        'month'=>$month,
                                                                                        'total_salary'=>$total_salary,
                                                                                        'level_salary'=>$level_salary,
                                                                                        'allowance_salary'=>$allowance_salary,
                                                                                        ]);
        }
    }
}
