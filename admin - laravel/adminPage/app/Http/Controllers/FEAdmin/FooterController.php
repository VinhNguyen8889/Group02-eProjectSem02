<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function allSelect(){
        $result = Footer::all();
        return $result;
    } //end method

    public function AllFooter(){
        $result = Footer::all();

        return view('backend/footer/all_footer', compact('result'));
    }

    public function AddFooter(){
        return view('backend/footer/add_footer');
    }

    
    public function StoreFooter(Request $request){

        $request->validate(
            ['address'=>'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
            'footer_credit' => 'required',
        ]
        );


        Footer::insert([
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'youtube'=>$request->youtube,
            'footer_credit'=>$request->footer_credit,

        ]); 

        $notification = array(
            'message' => 'Footer created succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.footer')->with($notification);
    }


    public function EditFooter($id){
        $result=Footer::findOrFail($id);

        return view('backend/footer/edit_footer', compact('result'));
    }

    public function UpdateFooter(Request $request, $id){

        $request->validate(
            ['address'=>'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
            'footer_credit' => 'required',
        ]
        );


        $data = Footer::findOrFail($id);
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->footer_credit = $request->footer_credit;


        $data->save();

        $notification = array(
            'message' => 'Footer updated succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.footer')->with($notification);
    }

    public function DeleteFooter($id){
        $deleteData = Footer::findOrFail($id);
        $deleteData->delete();

        $notification = array(
            'message' => 'Footer deleted succesfully',
            'alert-type'=> 'warning',
        );
        return redirect()->route('all.footer')->with($notification);
    }
}
