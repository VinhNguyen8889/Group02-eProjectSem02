<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobTitle;

class JobTitleController extends Controller
{
    public function AllJobTitle(){
    	$data['allData'] = JobTitle::all();
    	return view('school.setup.job_title.all_job_title',$data);
    }


    public function AddJobTitle(){
    	return view('school.setup.job_title.add_job_title');
    }


    public function StoreJobTitle(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:job_titles,name',
    		
    	]);

    	$data = new JobTitle();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Job Title Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.job_title')->with($notification);

    }



    public function EditJobTitle($id){
    	$data = JobTitle::find($id);
    	return view('school.setup.job_title.edit_job_title',compact('data'));

    }


    public function UpdateJobTitle(Request $request,$id){

		$data = JobTitle::find($id);
     
        $validatedData = $request->validate([
    		'name' => 'required|unique:job_titles,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Job Title Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.job_title')->with($notification);
    }


    public function DeleteJobTitle($id){
    	$user = JobTitle::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Job Title Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.job_title')->with($notification);

    }
}
