<?php

namespace App\Http\Controllers\School\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentReg;
use App\Models\StudentSubject;
use App\Models\Coupon;
use Auth;
use App\Exports\ClassExport;
use App\Exports\ClassStudentExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentManagementController extends Controller
{
    public function AllClastList(){

        if(Auth::user()->usertype=="Teacher"){
            $teacher_id = Auth::user()->id;
            $data['classes'] = StudentClass::where('teacher_id',$teacher_id)->get();
        } else {
            $data['classes'] = StudentClass::latest()->get();
        }
    	

    	return view('school.student.student_management.all_class_list',$data);
    }

    public function DetailClastList($class_id){
            $data['class'] = StudentClass::find($class_id);
            $data['students'] = StudentReg::where('class_id',$class_id)->get();

    	return view('school.student.student_management.detail_class_list',$data);
    }

    public function AddMark($class_id){
        $data['class'] = StudentClass::find($class_id);
        $data['students'] = StudentReg::where('class_id',$class_id)->get();

    return view('school.student.student_management.add_mark',$data);
}

public function StoreMark(Request $request,$class_id){

$countClass = count($request->mark);

        for ($i=0; $i <$countClass ; $i++) { 
            $student = StudentReg::where('class_id',$class_id)->find($request->student_id[$i]);
            $student->mark = $request->mark[$i];
            $student->save();

        } // End For Loop	 


   $notification = array(
        'message' => 'Mark added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('detail.class_list',$class_id)->with($notification);
} // end Method 

public function StudentClastList(){

        $student_id = Auth::user()->id;
        $data['regs'] = StudentReg::where('student_id',$student_id)->get();

    return view('school.student.student_management.student_class_list',$data);
}


public function exportClassStudent($class_id) 
{
    return Excel::download(new ClassStudentExport($class_id), 'users.xlsx');
}

public function ClassExport() 
{
    return Excel::download(new ClassExport, 'allclasslist.xlsx');
}

}
