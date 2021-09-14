<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Image;

class ServiceController extends Controller
{
    public function allSelect(){
        $result = Services::latest()->get() ;
        return $result;
    }

    public function AllService(){
        $result = Services::all();

        return view('backend/service/all_service', compact('result'));
    }

    public function AddService(){
        return view('backend/service/add_service');
    }

    
    public function StoreService(Request $request){

        $request->validate(
            ['service_name'=>'required',
            'service_description' => 'required',
            'service_logo' => 'required',],
            [
                'service_name.required' => 'Please input Service Name',
                'service_description.required' => 'Please input Service Description',
            ]
        );

            $file = $request->file('service_logo');
            $fileName= hexdec(uniqid()).".".$file->getClientOriginalExtension();
            Image::make($file)->resize(512,512)->save('upload/service_logo/'.$fileName);
            $saveUrl='http://127.0.0.1:8000/upload/service_logo/'.$fileName;

        Services::insert([
            'service_name'=>$request->service_name,
            'service_description'=>$request->service_description,
            'service_logo'=>$saveUrl,
        ]); 

        $notification = array(
            'message' => 'Services created succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.service')->with($notification);
    }


    public function EditService($id){
        $result=Services::findOrFail($id);

        return view('backend/service/edit_service', compact('result'));
    }

    public function UpdateService(Request $request, $id){

        $request->validate(
            ['service_name'=>'required',
            'service_description' => 'required',],
            [
                'service_name.required' => 'Please input Service Name',
                'service_description.required' => 'Please input Service Description',
            ]
        );


        $data = Services::findOrFail($id);
        $data->service_name = $request->service_name;
        $data->service_description = $request->service_description;

        if($request->file('service_logo')){
            $file = $request->file('service_logo');
            @unlink(public_path($data->service_logo));

            $fileName= hexdec(uniqid()).".".$file->getClientOriginalExtension();
            Image::make($file)->resize(512,512)->save('upload/service_logo/'.$fileName);
            $saveUrl='http://127.0.0.1:8000/upload/service_logo/'.$fileName;

            $data->service_logo = $saveUrl;
        }

        $data->save();

        $notification = array(
            'message' => 'Services updated succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.service')->with($notification);
    }

    public function DeleteService($id){
        $deleteData = Services::findOrFail($id);
        $deleteImg = substr($deleteData->service_logo, 22);
        @unlink(public_path($deleteImg));
        $deleteData->delete();

        $notification = array(
            'message' => 'Services deleted succesfully',
            'alert-type'=> 'warning',
        );
        return redirect()->route('all.service')->with($notification);
    }
}
