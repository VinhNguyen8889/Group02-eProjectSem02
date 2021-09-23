<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentDay;

class StudentDayController extends Controller
{
    public function AllStudentDay(){
    	$data['allData'] = StudentDay::all();
    	return view('school.setup.student_day.all_day',$data);
    }


    public function AddStudentDay(){
    	return view('school.setup.student_day.add_day');
    }


    public function StoreStudentDay(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:student_days,name',
            'short_code' => 'required|unique:student_days,short_code',
    	]);

    	$data = new StudentDay();
    	$data->name = $request->name;
        $data->short_code = $request->short_code;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Day Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.day')->with($notification);

    }



    public function EditStudentDay($id){
    	$data = StudentDay::findOrFail($id);
    	return view('school.setup.student_day.edit_day',compact('data'));

    }


    public function UpdateStudentDay(Request $request,$id){

		$data = StudentDay::findOrFail($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:student_days,name,'.$data->id,
    		'short_code' => 'required|unique:student_days,short_code,'.$data->id,
    	]);

    	
    	$data->name = $request->name;
        $data->short_code = $request->short_code;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Day Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.day')->with($notification);
    }


    public function DeleteStudentDay($id){
    	$user = StudentDay::findOrFail($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Student Day Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.day')->with($notification);

    }
}
