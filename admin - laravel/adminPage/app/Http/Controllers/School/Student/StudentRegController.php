<?php

namespace App\Http\Controllers\School\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
// use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;

class StudentRegController extends Controller
{
    public function StudentRegView(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();

    	$data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
    	$data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
    	// dd($data['class_id']);
    	$data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
    	return view('school.student.student_reg.all_student_reg',$data);
    }



    
    public function StudentRegAdd(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentGroup::all();
    	$data['shifts'] = StudentShift::all();
    	return view('backend.student.student_reg.student_add',$data);
    }

}
