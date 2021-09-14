<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    
    public function AllStudentClass(){
    	$data['allData'] = StudentClass::all();
    	return view('school.setup.student_class.all_class',$data);
    }


    public function AddStudentClass(){
    	return view('school.setup.student_class.add_class');
    }


    public function StoreStudentClass(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:student_classes,name',
    		
    	]);

    	$data = new StudentClass();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Class Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.class')->with($notification);

    }



    public function EditStudentClass($id){
    	$data = StudentClass::find($id);
    	return view('school.setup.student_class.edit_class',compact('data'));

    }


    public function UpdateStudentClass(Request $request,$id){

		$data = StudentClass::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:student_classes,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Class Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.class')->with($notification);
    }


    public function DeleteStudentClass($id){
    	$user = StudentClass::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Student Class Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.class')->with($notification);

    }
}
