<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSubject;
use App\Models\SubjectFeeLog;

class StudentSubjectController extends Controller
{
    public function AllStudentSubject(){
    	$data['allData'] = StudentSubject::all();
    	return view('school.setup.student_subject.all_subject',$data);
    }


    public function AddStudentSubject(){
    	return view('school.setup.student_subject.add_subject');
    }


    public function StoreStudentSubject(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:student_subjects,name',
            'short_code' => 'required|unique:student_subjects,short_code',
			'total_session' => 'required|numeric|max:30|min:8',
			'fee_amount' => 'required',
			'effective_date' => 'required',
    	]);

    	$data = new StudentSubject();
    	$data->name = $request->name;
        $data->short_code = $request->short_code;
		$data->total_session = $request->total_session;
    	$data->save();

		$fee = new SubjectFeeLog();
		$fee->fee_amount = $request->fee_amount;
		$fee->subject_id = $data->id;
		$fee->effective_date = date('Y-m-d',strtotime($request->effective_date));
		$fee->save();

    	$notification = array(
    		'message' => 'Student Subject Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.subject')->with($notification);

    }



    public function EditStudentSubject($id){
    	$data = StudentSubject::findOrFail($id);
    	return view('school.setup.student_subject.edit_subject',compact('data'));
    }


    public function UpdateStudentSubject(Request $request,$id){

		$data = StudentSubject::findOrFail($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:student_subjects,name,'.$data->id,
    		'short_code' => 'required|unique:student_subjects,short_code,'.$data->id,
			'total_session' => 'required|numeric|max:30|min:8',
    	]);

    	
    	$data->name = $request->name;
        $data->short_code = $request->short_code;
		$data->total_session = $request->total_session;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Subject Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.subject')->with($notification);
    }


    public function DeleteStudentSubject($id){

		try {
    	$data = StudentSubject::findOrFail($id);
    	$data->delete();

    	$notification = array(
    		'message' => 'Student Subject Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.subject')->with($notification);

	} catch (\Illuminate\Database\QueryException $e) {
		//   var_dump($e->errorInfo);
		$notification = array(
			'message' => 'Cannot delete the data with associated records.',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

	  }
    }


	public function FeeDetails($id){
		$data['subject'] = StudentSubject::findOrFail($id);

		$data['fee_amounts'] = SubjectFeeLog::where('subject_id',$id)->orderBy('effective_date','DESC')->get();

		return view('school.setup.student_subject.all_subject_fee',$data);
	}

	public function AddFee($id){
		$data['subject'] = StudentSubject::findOrFail($id);
		return view('school.setup.student_subject.add_subject_fee',$data);
	}

	public function StoreFee(Request $request){

		$validatedData = $request->validate([
    		'fee_amount' => 'required|unique:student_subjects,short_code',
			'effective_date' => 'required|unique:subject_fee_logs,effective_date,NULL,id,subject_id,'.$request->subject_id,
    	]);

		$fee = new SubjectFeeLog();
		$fee->subject_id = $request->subject_id;
		$fee->fee_amount = $request->fee_amount;
		$fee->effective_date = date('Y-m-d',strtotime($request->effective_date));
		$fee->save();

    	$notification = array(
    		'message' => 'New Fee Amount has been added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.subject_fee',$request->subject_id)->with($notification);
	}

	public function EditFee($id){
    	$data['feeData'] = SubjectFeeLog::findOrFail($id);

    	return view('school.setup.student_subject.edit_subject_fee',$data);
    }

	public function DeleteFee($id){
    	$data=SubjectFeeLog::findOrFail($id);
		$count=SubjectFeeLog::where('subject_id',$data->subject_id)->count();

		if($count>1){
			$data->delete();
			$notification = array(
				'message' => 'Student Subject Deleted Successfully',
				'alert-type' => 'info'
			);

		} else {
			$notification = array(
				'message' => 'You cannot delete this fee because it is the sole record!',
				'alert-type' => 'warning'
			);
		}


    	return redirect()->route('all.subject_fee', $data->subject_id)->with($notification);
    }


	public function UpdateFee(Request $request,$id){
		
		$fee = SubjectFeeLog::findOrFail($id);
		$subject_id = $fee->fee_subject->id;
		$validatedData = $request->validate([
    		'fee_amount' => 'required|unique:student_subjects,short_code',
			'effective_date' => 'required|unique:subject_fee_logs,effective_date,'.$fee->id.',id,subject_id,'.$subject_id
    	]);

		$fee->fee_amount = $request->fee_amount;
		$fee->effective_date = date('Y-m-d',strtotime($request->effective_date));
		$fee->save();

    	$notification = array(
    		'message' => 'Fee Amount has been updated Successfully',
    		'alert-type' => 'success'
    	);

	

    	return redirect()->route('all.subject_fee',$subject_id)->with($notification);
	}
}
