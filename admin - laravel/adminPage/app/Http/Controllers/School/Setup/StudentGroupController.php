<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function AllStudentGroup(){
    	$data['allData'] = StudentGroup::all();
    	return view('school.setup.student_group.all_group',$data);
    }


    public function AddStudentGroup(){
    	return view('school.setup.student_group.add_group');
    }


    public function StoreStudentGroup(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:student_groups,name',
    	]);

    	$data = new StudentGroup();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Group Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.group')->with($notification);

    }



    public function EditStudentGroup($id){
    	$data = StudentGroup::find($id);
    	return view('school.setup.student_group.edit_group',compact('data'));

    }


    public function UpdateStudentGroup(Request $request,$id){

		$data = StudentGroup::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:student_groups,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Group Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.group')->with($notification);
    }


    public function DeleteStudentGroup($id){
    	$user = StudentGroup::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Student Group Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.group')->with($notification);

    }
}
