<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;

class AssignSubjectController extends Controller
{
    public function AllAssignSubject(){
        // $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
    	return view('school.setup.assign_subject.all_assign_subject',$data);
    }


    public function AddAssignSubject(){
    	$data['school_subjects'] = SchoolSubject::all();
    	$data['classes'] = StudentClass::all();
    	return view('school.setup.assign_subject.add_assign_subject',$data);
    }


    public function StoreAssignSubject(Request $request){
		$validatedData = $request->validate([
    		'school_subject_id' => 'required',
    		'class_id' => 'required',
    	],
		[
			'required' => 'field is required.'
		],
		
		);
    	$countSchoolSubject = count($request->school_subject_id);
    	//if ($countSchoolSubject !=NULL) {
    		for ($i=0; $i <$countSchoolSubject ; $i++) { 
    			$assign_subject = new AssignSubject();
    			$assign_subject->school_subject_id = $request->school_subject_id[$i];
    			$assign_subject->class_id = $request->class_id;
    			$assign_subject->objective_mark = $request->objective_mark[$i];
                $assign_subject->assignment_mark = $request->assignment_mark[$i];
                $assign_subject->attendance_mark = $request->attendance_mark[$i];
    			$assign_subject->save();

    		} // End For Loop
    	//}// End If Condition

    	$notification = array(
    		'message' => 'Assign Subject Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.assign_subject')->with($notification);

    }  // End Method 



    public function EditAssignSubject($class_id){
    	$data['editData'] = AssignSubject::where('class_id',$class_id)->orderBy('school_subject_id','asc')->get();
    	$data['classes'] = StudentClass::all();
    	$data['school_subjects'] = SchoolSubject::all();
    	return view('school.setup.assign_subject.edit_assign_subject',$data);
    }


    public function UpdateAssignSubject(Request $request,$class_id){
		$validatedData = $request->validate([
    		'school_subject_id' => 'required',
    		'class_id' => 'required',
    	],
		[
			'required' => 'field is required.'
		],
		
		);
    	
        $countSchoolSubject = count($request->school_subject_id);
	    AssignSubject::where('class_id',$class_id)->delete(); 
    		for ($i=0; $i <$countSchoolSubject ; $i++) { 
    			$assign_subject = new AssignSubject();
    			$assign_subject->school_subject_id = $request->school_subject_id[$i];
    			$assign_subject->class_id = $request->class_id;
    			$assign_subject->objective_mark = $request->objective_mark[$i];
                $assign_subject->assignment_mark = $request->assignment_mark[$i];
                $assign_subject->attendance_mark = $request->attendance_mark[$i];
    			$assign_subject->save();

    		} // End For Loop	 

       $notification = array(
    		'message' => 'Data Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.assign_subject')->with($notification);
    } // end Method 


    public function DeleteAssignSubject($class_id){

	AssignSubject::where('class_id',$class_id)->delete(); 


       $notification = array(
    		'message' => 'Data Deleted Successfully',
    		'alert-type' => 'danger'
    	);

    	return redirect()->route('all.assign_subject')->with($notification);
    } // end Method 




 	public function DetailsAssignSubject($class_id){
    $data['detailsData'] = AssignSubject::where('class_id',$class_id)->orderBy('school_subject_id','asc')->get();

   return view('school.setup.assign_subject.details_assign_subject',$data);


 	}
}
