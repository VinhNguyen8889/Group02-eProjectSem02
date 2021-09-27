<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use App\Models\LevelTeacher;
use Illuminate\Http\Request;

class LevelTeacherController extends Controller
{
    public function AllLevelTeacher(){
    	$data['allData'] = LevelTeacher::all();
    	return view('school.setup.teacher_level.all_teacher_level',$data);
    }


    public function AddLevelTeacher(){
    	return view('school.setup.teacher_level.add_teacher_level');
    }


    public function StoreLevelTeacher(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:level_teachers,name',
    		'increment_salary' => 'required|numeric'
    	]);

    	$data = new LevelTeacher();
    	$data->name = trim($request->name);
		$data->increment_salary = $request->increment_salary;
    	$data->save();

    	$notification = array(
    		'message' => 'Teacher Level Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.teacher_level')->with($notification);

    }



    public function EditLevelTeacher($id){
    	$data = LevelTeacher::find($id);
    	return view('school.setup.teacher_level.edit_teacher_level',compact('data'));

    }


    public function UpdateLevelTeacher(Request $request,$id){

		$data = LevelTeacher::find($id);
     
        $validatedData = $request->validate([
    		'name' => 'required|unique:level_teachers,name,'.$data->id,
    		'increment_salary' => 'required'
    	]);

    	
    	$data->name = $request->name;
		$data->increment_salary = $request->increment_salary;
    	$data->save();

    	$notification = array(
    		'message' => 'Teacher Level Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.teacher_level')->with($notification);
    }
}
