<?php

namespace App\Http\Controllers\School\SetUp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function AllCoupon(){
    	$data['coupons'] = Coupon::orderBy('id','DESC')->get();
        $data['today'] = date('Y-m-d');
    	return view('school.setup.coupon.all_coupon',$data);
    }

    public function StoreCoupon(Request $request){

    	$request->validate([
    		'coupon_name' => 'required',
            'coupon_type' => 'required',
    		'coupon_discount' => 'required',
    		'valid_from' => 'required',
            'valid_to' => 'required|after:valid_from',
    	 
    	]);

        if($request->coupon_type=="value"){
            $discount = $request->coupon_discount;}
         else{
            $discount = $request->coupon_discount/100;
         };

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_type' => $request->coupon_type, 
            'coupon_discount' => $discount,
            'valid_from' => date('Y-m-d',strtotime($request->valid_from)),
            'valid_to' => date('Y-m-d',strtotime($request->valid_to)),
            ]);
    
            $notification = array(
                'message' => 'Coupon Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    
        } // end method 

        public function DeleteCoupon($id){

            try {

            Coupon::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Coupon Deleted Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->back()->with($notification);
        } catch (\Illuminate\Database\QueryException $e) {
			//   var_dump($e->errorInfo);
			$notification = array(
				'message' => 'Cannot delete the data with associated records.',
				'alert-type' => 'error'
			);

			return redirect()->back()->with($notification);

		  }
        }

        public function EditCoupon($id){
            $data['coupons'] = Coupon::orderBy('id','DESC')->get();
            $data['today'] = date('Y-m-d');
            $data['editCoupon'] = Coupon::findOrFail($id);
            return view('school.setup.coupon.edit_coupon',$data);
           }

        public function UpdateCoupon(Request $request, $id){

            $request->validate([
                'coupon_name' => 'required',
                'coupon_type' => 'required',
                'coupon_discount' => 'required',
                'valid_from' => 'required',
                'valid_to' => 'required|after:valid_from',
             
            ]);

            if($request->coupon_type=="value"){
                $discount = $request->coupon_discount;}
             else{
                $discount = $request->coupon_discount/100;
             };

        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_type' => $request->coupon_type, 
            'coupon_discount' => $discount,
            'valid_from' => date('Y-m-d',strtotime($request->valid_from)),
            'valid_to' => date('Y-m-d',strtotime($request->valid_to)),
            'status' => $request->status, 
            ]);
    
            $notification = array(
                'message' => 'Coupon Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.coupon')->with($notification);
    
    
        } // end mehtod 
}
