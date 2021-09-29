<?php

namespace App\Http\Controllers\School\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentReg;
use App\Models\StudentSubject;
use App\Models\Coupon;
use DB;
use PDF;
use App\Exports\UsersExport;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentRegController extends Controller
{
    public function StudentRegView(){

    	$data['students'] = User::where('role','Student')->orderBy('created_at','DESC')->get();

    	return view('school.student.student_reg.all_student_reg',$data);
    }

	public function StudentRegDelete($id){
		try{
    	$data = User::findOrFail($id);
		$data->delete();

		$notification = array(
    		'message' => 'Student Account has been deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.student_reg')->with($notification);
	} catch (\Illuminate\Database\QueryException $e) {
		//   var_dump($e->errorInfo);
		$notification = array(
			'message' => 'Cannot delete the data with associated records.',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

	  }
    }
    


    public function StudentRegAdd(){
    	return view('school.student.student_reg.add_student_reg');
    }


        public function StudentRegStore(Request $request){
    	DB::transaction(function() use($request){
			$checkYear = date('Y');

			$strSystemMaxDate = (date('Y') - 14).date('md');

			$validatedData = $request->validate([
				'name' => 'required|regex:/^[a-zA-Z ]+$/i',
				'mobile' => 'required|digits:10',
				'email' => 'required|unique:users,email',
				'address' => 'required',
				'gender' => 'required',
				'dob' => 'required|before:'.$strSystemMaxDate,
			]);

    	$student = User::where('usertype','Student')->orderBy('id','DESC')->first();

    	if ($student == null) {
    		$firstReg = 0;
    		$studentId = $firstReg+1;
    		if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}
    	}else{
     $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id_no;
     	$studentId = substr($student,4,4) +1;
     	if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}

    	} // end else 

    	$final_id_no = $checkYear.$id_no;
    	$user = new User();
    	$code = 'Welcome'.date('Ymd',strtotime($request->dob));
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->usertype = 'Student';
		$user->role = 'Student';
    	$user->code = $code;
    	$user->name = $request->name;
		$user->email = $request->email;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

 	    $user->save();

    	});

        $notification = array(
    		'message' => 'Student Registration Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.student_reg')->with($notification);
}


public function StudentRegEdit($id){
    $student = User::findOrFail($id);

    return view('school.student.student_reg.edit_student_reg',compact('student'));

}


public function StudentRegUpdate(Request $request,$id){
    DB::transaction(function() use($request,$id){
		
		$strSystemMaxDate = (date('Y') - 14).date('md');
		$validatedData = $request->validate([
			'name' => 'required|regex:/^[a-zA-Z ]+$/i',
			'mobile' => 'required|digits:10',
			'email' => 'required|unique:users,email,'.$id,
			'address' => 'required',
			'gender' => 'required',
			'dob' => 'required|before:'.$strSystemMaxDate,
		]);

    $user = User::where('id',$id)->first();    	 
    $user->name = $request->name;
    $user->mobile = $request->mobile;
    $user->address = $request->address;
    $user->gender = $request->gender;
	$user->email = $request->email;
    $user->dob = date('Y-m-d',strtotime($request->dob));

     $user->save();

    });


    $notification = array(
        'message' => 'Student Registration Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.student_reg')->with($notification);

} // End Method 



public function StudentClassRegAdd($id){

	$data['student'] = User::findOrFail($id);
	$data['subjects'] = StudentSubject::all();
	$today = date('Y-m-d');
	$data['vouchers'] = Coupon::where('status',1)->where('valid_from','<=',$today)->where('valid_to','>=',$today)->latest()->get();

	return view('school.student.student_reg.add_student_class_reg',$data);
}

public function GetClassReg($subject_id){

	$class = StudentClass::where('subject_id',$subject_id)->latest()->get();
	return json_encode($class);
}

public function GetTransaction($class_id){
	$fee = StudentClass::findOrFail($class_id);
	return json_encode($fee);
}

public function GetVoucher($voucher_id){
	$voucher = Coupon::findOrFail($voucher_id);
	return json_encode($voucher);

}



public function TransactionDelete($id){

	$data = StudentReg::findOrFail($id);
	$data->delete();

	$notification = array(
		'message' => 'Transaction has been deleted Successfully',
		'alert-type' => 'info'
	);

	return redirect()->back()->with($notification);
}


public function AllRegStore(Request $request){


	$validatedData = $request->validate([
		'payment' => 'required',
		'reg_class_id' => 'required|unique:student_regs,class_id,NULL,id,student_id,'.$request->reg_student_id,
	]);

	
	$newReg = new StudentReg();

	$newReg->student_id = $request->reg_student_id;
	$newReg->class_id = $request->reg_class_id;
	$newReg->voucher_name = $request->reg_coupon_name;
	$newReg->value = $request->reg_value;
	$newReg->discount_amount = $request->reg_discount_amount;
	$newReg->paid = $request->reg_paid;
	$newReg->fee_amount = $request->reg_fee_amount;
	$newReg->payment = $request->payment;



	$thisYear = date('Y');
	$thisMonth = date('m');

	$curReg = StudentReg::whereYear('created_at',$thisYear)->whereMonth('created_at',$thisMonth)->orderBy('created_at','DESC')->first();

	if ($curReg == null) {
		$id = $firstReg+1;
		$id_temp = "000".$id;

	}else{
		$curID = $curReg->id_no;
		$id = substr($curID,6,4) +1;
	 if ($id < 10) {
			$id_temp = '000'.$id;
		}elseif ($id < 100) {
			$id_temp = '00'.$id;
		}elseif ($id < 1000) {
			$id_temp = '0'.$id;
		}

	} // end else 

	$final_id_no = $thisYear.$thisMonth.$id_temp;

	$newReg->id_no = $final_id_no;

	$newReg->save();

	$notification = array(
		'message' => 'Class Registration Updated Successfully',
		'alert-type' => 'success'
	);


	$data['detail'] = StudentReg::where('id_no',$final_id_no)->first();
	$pdf = PDF::loadView('school.student.student_reg.reg_confirm', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('invoice.pdf');
}

public function InvoiceReg($reg_id){
	$data['detail'] = StudentReg::where('id_no',$reg_id)->first();

	$pdf = PDF::loadView('school.student.student_reg.reg_confirm', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('invoice.pdf');
}



public function AllRegView(){
	$data['regs']= StudentReg::orderBy('created_at','DESC')->get();

	return view('school.student.student_reg.view_all_reg',$data);
}

public function ViewStudentClassList($student_id){

	$data['regs'] = StudentReg::where('student_id',$student_id)->get();

return view('school.student.student_reg.view_student_class_list',$data);
}

    public function exportStudent() 
    {
        return Excel::download(new UsersExport, 'studentlist.xlsx');
    }

	public function exportTransaction() 
    {
        return Excel::download(new TransactionExport, 'transactionlist.xlsx');
    }


	public function EditTransaction($id){

		$data['transaction'] = StudentReg::findOrFail($id);
		$subject_id = StudentReg::findOrFail($id)->class->subject_id;
		$today = StudentReg::findOrFail($id)->first()->created_at;
		$data['subjects'] = StudentSubject::all();
		$data['selectedClasses'] = StudentClass::where('subject_id',$subject_id)->get();
		$data['vouchers'] = Coupon::where('status',1)->where('valid_from','<=',$today)->where('valid_to','>=',$today)->latest()->get();
	
		return view('school.student.student_reg.edit_student_class_reg',$data);
	
	}

	public function UpdateTransaction(Request $request, $id){

		$newReg = StudentReg::findOrFail($id);

			$validatedData = $request->validate([
				'payment' => 'required',
				'reg_class_id' => 'required|unique:student_regs,class_id,'.$newReg->id.',id,student_id,'.$newReg->student_id,
			]);
		
			$newReg->class_id = $request->reg_class_id;
			$newReg->voucher_name = $request->reg_coupon_name;
			$newReg->value = $request->reg_value;
			$newReg->discount_amount = $request->reg_discount_amount;
			$newReg->paid = $request->reg_paid;
			$newReg->fee_amount = $request->reg_fee_amount;
			$newReg->payment = $request->payment;

			$newReg->save();

			$data['detail'] = StudentReg::findOrFail($id)->first();
			$pdf = PDF::loadView('school.student.student_reg.reg_confirm', $data);
			$pdf->SetProtection(['copy', 'print'], '', 'pass');
			return $pdf->stream('invoice.pdf');
	
	}


}