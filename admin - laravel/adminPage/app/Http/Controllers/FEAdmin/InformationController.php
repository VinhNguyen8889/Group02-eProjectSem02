<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function allSelect(){
        $result = Information::all();
        return $result;
    }

    
    public function AllInformation(){
        $result = Information::all();

        return view('backend/information/all_information', compact('result'));
    }

    public function AddInformation(){

        return view('backend/information/add_information');
    }

    
    public function StoreInformation(Request $request){
        Information::insert([
            'about'=>$request->about,
            'refund'=>$request->about,
            'terms'=>$request->about,
            'privacy'=>$request->about,
        ]); 

        $notification = array(
            'message' => 'Information created succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.information')->with($notification);
    }


    public function EditInformation($id){
        $result=Information::findOrFail($id);

        return view('backend/information/edit_information', compact('result'));
    }

    public function UpdateInformation(Request $request, $id){
        Information::findOrFail($id)->update([
            'about'=>$request->about,
            'refund'=>$request->refund,
            'terms'=>$request->terms,
            'privacy'=>$request->privacy,
        ]);
        $notification = array(
            'message' => 'Information updated succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.information')->with($notification);
    }

    public function DeleteInformation($id){
        Information::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Information deleted succesfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('all.information')->with($notification);
    }
}
