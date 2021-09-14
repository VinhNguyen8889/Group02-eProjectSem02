<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass; 

class FeeAmountController extends Controller
{
    public function AllFeeAmount(){
        // $data['allData'] = FeeAmount::all();
        $data['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
    	return view('school.setup.fee_amount.all_fee_amount',$data);
    }


    public function AddFeeAmount(){
    	$data['fee_categories'] = FeeCategory::all();
    	$data['classes'] = StudentClass::all();
    	return view('school.setup.fee_amount.add_fee_amount',$data);
    }


    public function StoreFeeAmount(Request $request){

    	$countClass = count($request->class_id);
    	if ($countClass !=NULL) {
    		for ($i=0; $i <$countClass ; $i++) { 
    			$fee_amount = new FeeAmount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();

    		} // End For Loop
    	}// End If Condition

    	$notification = array(
    		'message' => 'Fee Amount Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.fee_amount')->with($notification);

    }  // End Method 



    public function EditFeeAmount($fee_category_id){
    	$data['editData'] = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
    	$data['fee_categories'] = FeeCategory::all();
    	$data['classes'] = StudentClass::all();
    	return view('school.setup.fee_amount.edit_fee_amount',$data);
    }


    public function UpdateFeeAmount(Request $request,$fee_category_id){
    	if ($request->class_id == NULL) {
       
        $notification = array(
    		'message' => 'Sorry You do not select any class amount',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('edit.fee_amount',$fee_category_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->class_id);
	FeeAmount::where('fee_category_id',$fee_category_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$fee_amount = new FeeAmount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();

    		} // End For Loop	 

    	}// end Else

       $notification = array(
    		'message' => 'Data Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.fee_amount')->with($notification);
    } // end Method 


    public function DeleteFeeAmount($fee_category_id){

	FeeAmount::where('fee_category_id',$fee_category_id)->delete(); 


       $notification = array(
    		'message' => 'Data Deleted Successfully',
    		'alert-type' => 'danger'
    	);

    	return redirect()->route('all.fee_amount')->with($notification);
    } // end Method 




 	public function DetailsFeeAmount($fee_category_id){
   $data['detailsData'] = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();

   return view('school.setup.fee_amount.details_fee_amount',$data);


 	}
}
