<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function AllStudentShift(){
    	$data['allData'] = StudentShift::all();
    	return view('school.setup.student_shift.all_shift',$data);
    }


    public function AddStudentShift(){
    	return view('school.setup.student_shift.add_shift');
    }


    public function StoreStudentShift(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:student_shifts,name',
    	]);

    	$data = new StudentShift();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Shift Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.shift')->with($notification);

    }



    public function EditStudentShift($id){
    	$data = StudentShift::find($id);
    	return view('school.setup.student_shift.edit_shift',compact('data'));

    }


    public function UpdateStudentShift(Request $request,$id){

		$data = StudentShift::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:student_shifts,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Shift Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.shift')->with($notification);
    }


    public function DeleteStudentShift($id){
    	$user = StudentShift::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Student Shift Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.shift')->with($notification);

    }
}
