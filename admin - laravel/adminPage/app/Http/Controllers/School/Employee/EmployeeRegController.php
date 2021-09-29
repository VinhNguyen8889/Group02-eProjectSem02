<?php

namespace App\Http\Controllers\School\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryLog;
use App\Models\JobTitle;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class EmployeeRegController extends Controller
{
    public function EmployeeRegAll(){

    	$data['allData'] = User::where('usertype','Teacher')->get();
    	return view('school.employee.employee_registration.all_employee_reg',$data);
    }


    public function EmployeeRegAdd(){
    	$data['designation'] = JobTitle::all();
    	return view('school.employee.employee_registration.add_employee_reg',$data);
    }




    public function EmployeeRegStore(Request $request){
		$strSystemMaxDate = (date('Y') - 18).date('md');
		$validatedData = $request->validate([
    		'name' => 'required|regex:/^[a-zA-Z ]+$/i',
			'fname' => 'nullable|regex:/^[a-zA-Z ]+$/i',
			'mname' => 'nullable|regex:/^[a-zA-Z ]+$/i',
			'mobile' => 'required|digits:10',
			'email' => 'required|unique:users,email',
    		'address' => 'required',
			'gender' => 'required',
			'designation_id' => 'required',
			'dob' => 'required|before:'.$strSystemMaxDate,
			'join_date' => 'required|date_format:Y-m-d|before:tomorow',
			'image' => 'file|image|mimes:jpeg,png,jpg|max:10240'
    	],
		[
			'alpha' => 'Field must be entirely alphabetic characters',
			'required' => 'Field is required.',
			'digits' => 'Mobile number must be 10 digits.',
			'unique' => 'Email is exited.',
			'image.image' => 'The file upload must be image file',
 			'image.mimes' => 'The extension of image are jpg, jpeg, png',
 			'image.max' => 'The maximum size of image is 10Mb'

		]);
    	$checkYear = date('Ym',strtotime($request->join_date));
    	//dd($checkYear);
    	$employee = User::where('usertype','Teacher')->orderBy('id','DESC')->first();

    	if ($employee == null) {
    		$firstReg = 0;
    		$employeeId = $firstReg+1;
    		if ($employeeId < 10) {
    			$id_no = '000'.$employeeId;
    		}elseif ($employeeId < 100) {
    			$id_no = '00'.$employeeId;
    		}elseif ($employeeId < 1000) {
    			$id_no = '0'.$employeeId;
    		}
    	}else{
     	$employee = User::where('usertype','Teacher')->orderBy('id','DESC')->first()->id;
     	$employeeId = $employee+1;
     	if ($employeeId < 10) {
    			$id_no = '000'.$employeeId;
    		}elseif ($employeeId < 100) {
    			$id_no = '00'.$employeeId;
    		}elseif ($employeeId < 1000) {
    			$id_no = '0'.$employeeId;
    		}

    	} // end else 
		$designation = JobTitle::where('id', $request->designation_id)->first();
		$final_id_no = substr($designation->name,0,1).'.'.$checkYear.'.'.$id_no;
    	$user = new User();
		$user->role = 'Teacher';
    	$code = rand(0000,9999);
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->usertype = 'Teacher';
    	$user->code = $code;
    	$user->name = trim($request->name);
    	$user->fname = trim($request->fname);
    	$user->mname = trim($request->mname);
    	$user->mobile = trim($request->mobile);
		$user->email = trim($request->email);
    	$user->address = trim($request->address);
    	$user->gender = $request->gender;
    	$user->designation_id = $request->designation_id;
		$user->salary = $designation->basic_salary;
		$user->religion = 0;
		
    	$user->dob = date('Y-m-d',strtotime($request->dob));
    	$user->join_date = date('Y-m-d',strtotime($request->join_date));

    	if ($request->hasFile('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

          $employee_salary = new EmployeeSalaryLog();
          $employee_salary->employee_id = $user->id;
          $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
          $employee_salary->previous_salary = $designation->basic_salary;
		  $employee_salary->present_salary = $designation->basic_salary;
          $employee_salary->increment_salary = '0';
          $employee_salary->save();


    	$notification = array(
    		'message' => 'Employee Registration Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.employee_reg')->with($notification);

    } // END Method




    public function EmployeeRegEdit($id){
    	$data['editData'] = User::find($id);
		$data['designation'] = JobTitle::all();
    	return view('school.employee.employee_registration.edit_employee_reg',$data);

    }


    public function EmployeeRegUpdate(Request $request, $id){
		$strSystemMaxDate = (date('Y') - 18).date('md');
    	$user = User::find($id);
		$validatedData = $request->validate([
    		'name' => 'required|regex:/^[a-zA-Z ]+$/i',
			'fname' => 'nullable|regex:/^[a-zA-Z ]+$/i',
			'mname' => 'nullable|regex:/^[a-zA-Z ]+$/i',
			'mobile' => 'required|digits:10',
			'email' => 'required|unique:users,email,'.$id,
    		'address' => 'required',
			'gender' => 'required',
			'designation_id' => 'required',
			'dob' => 'required|before:'.$strSystemMaxDate,
			'join_date' => 'required|date_format:Y-m-d|before:tomorow',
			'image' => 'file|image|mimes:jpeg,png,jpg|max:10240'
    	],
		[
			'required' => 'Field is required.',
			'digits' => 'Mobile number must be 10 digits.',
			'unique' => 'Email is exited.',
			'image.image' => 'The file upload must be image file',
 			'image.mimes' => 'The extension of image are jpg, jpeg, png',
 			'image.max' => 'The maximum size of image is 10Mb'

		]);
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
		$user->email = $request->email;
    	 
    	$user->designation_id = $request->designation_id;
    	$user->dob = date('Y-m-d',strtotime($request->dob));
    	 

    	if ($request->hasFile('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/employee_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/employee_images'),$filename);
    	}else{
			$filename = $user -> image;
		}
		$user->image = $filename;
 	    $user->save();

         

    	$notification = array(
    		'message' => 'Employee Registration Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.employee_reg')->with($notification);


    }// END METHOD
}
