<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentDay;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentSubject;
use App\Models\SubjectFeeLog;
use App\Models\User;

class StudentClassController extends Controller
{
    
    public function AllStudentClass(){
    	$data['allData'] = StudentClass::all();
    	return view('school.setup.student_class.all_class',$data);
    }


    public function AddStudentClass(){
		$data['years'] = StudentYear::all();
    	$data['days'] = StudentDay::all();
    	$data['groups'] = StudentGroup::all();
    	$data['shifts'] = StudentShift::all();
		$data['subjects'] = StudentSubject::all();
		$data['teachers'] = User::all()->where('role','Teacher');
		$data['class_name'] = NULL;
		$data['gen_teacher'] = NULL;
		$data['gen_fee'] = NULL;
		$data['gen_teacher'] = NULL;

		$data['year_id'] = NULL;
		$data['day_id'] = NULL;
		$data['group_id'] = NULL;
		$data['shift_id'] = NULL;
		$data['subject_id'] = NULL;
		$data['planned_start_date'] = NULL;
		$data['teacher_id'] = NULL;
		$data['disabled'] = "disabled";
		$data['button'] = "btn btn-dark";


    	return view('school.setup.student_class.add_class',$data);
    }

	public function ClassGeneration(Request $request){

		$data['years'] = StudentYear::all();
    	$data['days'] = StudentDay::all();
    	$data['groups'] = StudentGroup::all();
    	$data['shifts'] = StudentShift::all();
		$data['subjects'] = StudentSubject::all();
		$data['teachers'] = User::all()->where('role','Teacher');

		$validatedData = $request->validate([
    		'year_id' => 'required',
			'day_id' => 'required',
			'group_id' => 'required',
			'shift_id' => 'required',
			'subject_id' => 'required',
			// 'teacher_id' => 'required',
			'effective_date' => 'required|after:today',
    	]);
		

		
			$check_effective_date = date('Y-m-d',strtotime($request->effective_date));
			$min_date = SubjectFeeLog::where('subject_id',$request->subject_id)->orderBy('effective_date','ASC')->firstOrFail()->effective_date;

			if($min_date>=$check_effective_date){
				$notification = array(
					'message' => 'There is no Fee record associated with the date you choose!',
					'alert-type' => 'error'
				);
				return redirect()->back()->with($notification);
			} else{

			$data['gen_fee']= SubjectFeeLog::where('subject_id',$request->subject_id)->where('effective_date','<=',$check_effective_date)->orderBy('effective_date','DESC')->firstOrFail()->fee_amount;
	

		$gen_year=StudentYear::where('id',$request->year_id)->first()->name;
    	$gen_day = StudentDay::where('id',$request->day_id)->first()->short_code;
    	$gen_group = StudentGroup::where('id',$request->group_id)->first()->short_code;
    	$gen_shift= StudentShift::where('id',$request->shift_id)->first()->short_code;
		$gen_subject = StudentSubject::where('id',$request->subject_id)->first()->short_code;
		
		$gen_effective_date = date('my',strtotime($request->effective_date));
		$data['class_name'] = $gen_group."_".$gen_subject."_".$gen_shift.$gen_day."_".$gen_effective_date;

		if($request->teacher_id==0){
			$data['gen_teacher'] = "Undefined";
			$data['teacher_id'] = NULL;
		} else {
			$data['gen_teacher'] = User::all()->where('id',$request->teacher_id)->first()->name;
			$data['teacher_id'] = $request->teacher_id;
		}

		$data['year_id'] = $request->year_id;
		$data['day_id'] = $request->day_id;
		$data['group_id'] = $request->group_id;
		$data['shift_id'] = $request->shift_id;
		$data['subject_id'] = $request->subject_id;
		$data['planned_start_date'] = $check_effective_date;

		$data['disabled'] = "";
		$data['button'] = "btn btn-success";

    	return view('school.setup.student_class.add_class',$data);
	
	}

    }


    public function StoreStudentClass(Request $request){

		$validatedData = $request->validate([
    		'gen_class' => 'required|unique:student_classes,name',
    	]);


    	$data = new StudentClass();

    	$data->year_id = $request->gen_year_id;
		$data->group_id = $request->gen_group_id;
		$data->day_id = $request->gen_day_id;
		$data->subject_id = $request->gen_subject_id;
		$data->shift_id = $request->gen_shift_id;
		$data->planned_start_date = $request->gen_planned_start_date;
		$data->applied_fee = $request->gen_applied_fee;
		$data->teacher_id = $request->gen_teacher_id;
		$data->name = $request->gen_class;

    	$data->save();

    	$notification = array(
    		'message' => 'Student Class Created Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.class')->with($notification);

    }



    // public function EditStudentClass($id){
    // 	$data = StudentClass::find($id);
    // 	return view('school.setup.student_class.edit_class',compact('data'));

    // }


    // public function UpdateStudentClass(Request $request,$id){

	// 	$data = StudentClass::find($id);
     
    //  $validatedData = $request->validate([
    // 		'name' => 'required|unique:student_classes,name,'.$data->id
    		
    // 	]);

    	
    // 	$data->name = $request->name;
    // 	$data->save();

    // 	$notification = array(
    // 		'message' => 'Student Class Updated Successfully',
    // 		'alert-type' => 'success'
    // 	);

    // 	return redirect()->route('all.class')->with($notification);
    // }


    public function DeleteStudentClass($id){
    	$data = StudentClass::find($id);
    	$data->delete();

    	$notification = array(
    		'message' => 'Class Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.class')->with($notification);

    }
}
