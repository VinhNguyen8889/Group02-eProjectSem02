<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function AllExamType(){
    	$data['allData'] = ExamType::all();
    	return view('school.setup.exam_type.all_exam_type',$data);
    }


    public function AddExamType(){
    	return view('school.setup.exam_type.add_exam_type');
    }


    public function StoreExamType(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:exam_types,name',
    		
    	]);

    	$data = new ExamType();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Exam Type Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.exam_type')->with($notification);

    }



    public function EditExamType($id){
    	$data = ExamType::find($id);
    	return view('school.setup.exam_type.edit_exam_type',compact('data'));

    }


    public function UpdateExamType(Request $request,$id){

		$data = ExamType::find($id);
     
        $validatedData = $request->validate([
    		'name' => 'required|unique:exam_types,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Exam Type Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.exam_type')->with($notification);
    }


    public function DeleteExamType($id){
    	$user = ExamType::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Exam Type Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.exam_type')->with($notification);

    }
}
