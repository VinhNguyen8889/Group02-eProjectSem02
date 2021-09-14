<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReview;
use Image;

class ClientReviewController extends Controller
{
    public function allSelect(){
        $result = ClientReview::all();
        return $result;
    } //end method


    public function AllReview(){
        $result = ClientReview::all();

        return view('backend/review/all_review', compact('result'));
    }

    public function AddReview(){
        return view('backend/review/add_review');
    }

    
    public function StoreReview(Request $request){

        $request->validate(
            ['client_name'=>'required',
            'client_description' => 'required',
            'client_img' => 'required',],
            [
                'client_name.required' => 'Please input Review Name',
                'client_description.required' => 'Please input Review Description',
                'client_img.required' => 'Please input Image',
            ]
        );

            $file = $request->file('client_img');
            $fileName= hexdec(uniqid()).".".$file->getClientOriginalExtension();
            Image::make($file)->resize(512,512)->save('upload/client_images/'.$fileName);
            $saveUrl='http://127.0.0.1:8000/upload/client_images/'.$fileName;

        ClientReview::insert([
            'client_name'=>$request->client_name,
            'client_description'=>$request->client_description,
            'client_img'=>$saveUrl,
        ]); 

        $notification = array(
            'message' => 'ClientReview created succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.review')->with($notification);
    }


    public function EditReview($id){
        $result=ClientReview::findOrFail($id);

        return view('backend/review/edit_review', compact('result'));
    }

    public function UpdateReview(Request $request, $id){

        $request->validate(
            ['client_name'=>'required',
            'client_description' => 'required',
            'client_img' => 'required',],
            [
                'client_name.required' => 'Please input Review Name',
                'client_description.required' => 'Please input Review Description',
                'client_img.required' => 'Please input Image',
            ]
        );


        $data = ClientReview::findOrFail($id);
        $data->client_name = $request->client_name;
        $data->client_description = $request->client_description;

        if($request->file('client_img')){
            $file = $request->file('client_img');
            $deleteImg = substr($data->client_img, 22);
            @unlink(public_path($deleteImg));

            $fileName= hexdec(uniqid()).".".$file->getClientOriginalExtension();
            Image::make($file)->resize(512,512)->save('upload/client_images/'.$fileName);
            $saveUrl='http://127.0.0.1:8000/upload/client_images/'.$fileName;

            $data->client_img = $saveUrl;
        }

        $data->save();

        $notification = array(
            'message' => 'ClientReview updated succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.review')->with($notification);
    }

    public function DeleteReview($id){
        $deleteData = ClientReview::findOrFail($id);
        $deleteImg = substr($deleteData->client_img, 22);
        @unlink(public_path($deleteImg));
        $deleteData->delete();

        $notification = array(
            'message' => 'ClientReview deleted succesfully',
            'alert-type'=> 'warning',
        );
        return redirect()->route('all.review')->with($notification);
    }
}
