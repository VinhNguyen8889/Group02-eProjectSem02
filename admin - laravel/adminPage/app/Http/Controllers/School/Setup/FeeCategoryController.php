<?php

namespace App\Http\Controllers\School\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function AllFeeCategory(){
    	$data['allData'] = FeeCategory::all();
    	return view('school.setup.fee_category.all_fee_category',$data);
    }


    public function AddFeeCategory(){
    	return view('school.setup.fee_category.add_fee_category');
    }


    public function StoreFeeCategory(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:fee_categories,name',
    	]);

    	$data = new FeeCategory();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Shift Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.fee_category')->with($notification);

    }



    public function EditFeeCategory($id){
    	$data = FeeCategory::find($id);
    	return view('school.setup.fee_category.edit_fee_category',compact('data'));

    }


    public function UpdateFeeCategory(Request $request,$id){

		$data = FeeCategory::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:fee_categories,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Subject Fee Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.fee_category')->with($notification);
    }


    public function DeleteFeeCategory($id){

		try {
			$user = FeeCategory::find($id);
			$user->delete();
	
			$notification = array(
				'message' => 'Student Shift Deleted Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('all.fee_category')->with($notification);
	
		  
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
