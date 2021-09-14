<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    public function AllSchoolSubject(){
    	$data['allData'] = SchoolSubject::all();
    	return view('school.setup.school_subject.all_school_subject',$data);
    }


    public function AddSchoolSubject(){
    	return view('school.setup.school_subject.add_school_subject');
    }


    public function StoreSchoolSubject(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:school_subjects,name',
    		
    	]);

    	$data = new SchoolSubject();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'School Subject Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.school_subject')->with($notification);

    }



    public function EditSchoolSubject($id){
    	$data = SchoolSubject::find($id);
    	return view('school.setup.school_subject.edit_school_subject',compact('data'));

    }


    public function UpdateSchoolSubject(Request $request,$id){

		$data = SchoolSubject::find($id);
     
        $validatedData = $request->validate([
    		'name' => 'required|unique:school_subjects,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'School Subject Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.school_subject')->with($notification);
    }


    public function DeleteSchoolSubject($id){
		try {
			$user = SchoolSubject::find($id);
			$user->delete();

			$notification = array(
				'message' => 'School Subject Deleted Successfully',
				'alert-type' => 'info'
			);

			return redirect()->route('all.school_subject')->with($notification);
		} catch (\Illuminate\Database\QueryException $e) {
			//   var_dump($e->errorInfo);
			$notification = array(
				'message' => 'Cannot delete the data with associated records.',
				'alert-type' => 'error'
			);

			return redirect()->back()->with($notification);

		}
    	

    }
}
