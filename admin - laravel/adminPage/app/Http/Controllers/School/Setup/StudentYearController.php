<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
        public function AllStudentYear(){
    	$data['allData'] = StudentYear::orderBy('name','DESC')->get();
    	return view('school.setup.student_year.all_year',$data);
    }


    public function AddStudentYear(){
    	return view('school.setup.student_year.add_year');
    }


    public function StoreStudentYear(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:student_years,name',
    	]);

    	$data = new StudentYear();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Year Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.year')->with($notification);

    }



    public function EditStudentYear($id){
    	$data = StudentYear::find($id);
    	return view('school.setup.student_year.edit_year',compact('data'));

    }


    public function UpdateStudentYear(Request $request,$id){

		$data = StudentYear::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:student_years,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Year Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.year')->with($notification);
    }


    public function DeleteStudentYear($id){
    	$user = StudentYear::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Student Year Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.year')->with($notification);

    }
}
