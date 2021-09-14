<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use Image;
class ProjectController extends Controller
{
    public function threeSelect(){
        $result = Projects::limit(3)->get();
        return $result;
    }

    public function allSelect(){
        $result = Projects::all();
        return $result;
    }

    public function detailSelect($projectID){
        $result = Projects::where('id',$projectID)->get();
        return $result;
    }

    public function AllProject(){
        $result = Projects::all();

        return view('backend/project/all_project', compact('result'));
    }

    public function AddProject(){
        return view('backend/project/add_project');
    }

    
    public function StoreProject(Request $request){

        $request->validate(
            ['project_name'=>'required',
            'project_description' => 'required',
            'project_img_one' => 'required',
            'project_img_two' => 'required',
            'project_features' => 'required',
            'project_live_preview' => 'required',],
            [
                'project_name.required' => 'Please input Project Name',
                'project_description.required' => 'Please input Project Description',
                'project_features.required' => 'Please input Project Feature',
                'project_live_preview.required' => 'Please input Project Live Preview',
            ]
        );

            $file_1 = $request->file('project_img_one');
            $fileName_1= hexdec(uniqid()).".".$file_1->getClientOriginalExtension();
            Image::make($file_1)->resize(626,417)->save('upload/project_images/'.$fileName_1);
            $saveUrl_1='http://127.0.0.1:8000/upload/project_images/'.$fileName_1;

            $file_2 = $request->file('project_img_two');
            $fileName_2= hexdec(uniqid()).".".$file_2->getClientOriginalExtension();
            Image::make($file_2)->resize(540,607)->save('upload/project_images/'.$fileName_2);
            $saveUrl_2='http://127.0.0.1:8000/upload/project_images/'.$fileName_2;

        Projects::insert([
            'project_name'=>$request->project_name,
            'project_description'=>$request->project_description,
            'project_img_one'=>$saveUrl_1,
            'project_img_two'=>$saveUrl_2,
            'project_features'=>$request->project_features,
            'project_live_preview'=>$request->project_live_preview,
        ]); 

        $notification = array(
            'message' => 'Projects created succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.project')->with($notification);
    }


    public function EditProject($id){
        $result=Projects::findOrFail($id);

        return view('backend/project/edit_project', compact('result'));
    }

    public function UpdateProject(Request $request, $id){

        $request->validate(
            ['project_name'=>'required',
            'project_description' => 'required',
            'project_features' => 'required',
            'project_live_preview' => 'required',],
            [
                'project_name.required' => 'Please input Project Name',
                'project_description.required' => 'Please input Project Description',
                'project_features.required' => 'Please input Project Feature',
                'project_live_preview.required' => 'Please input Project Live Preview',
            ]
        );


        $data = Projects::findOrFail($id);
        $data->project_name = $request->project_name;
        $data->project_description = $request->project_description;
        $data->project_features = $request->project_features;
        $data->project_live_preview = $request->project_live_preview;

        if($request->file('project_img_one')){
            $file_1 = $request->file('project_img_one');
            @unlink(public_path(substr($data->project_img_one, 22)));

            $fileName_1= hexdec(uniqid()).".".$file_1->getClientOriginalExtension();
            Image::make($file_1)->resize(626,417)->save('upload/project_images/'.$fileName_1);
            $saveUrl_1='http://127.0.0.1:8000/upload/project_images/'.$fileName_1;

            $data->project_img_one = $saveUrl_1;
        }

        if($request->file('project_img_two')){
            $file_2 = $request->file('project_img_two');
            @unlink(public_path(substr($data->project_img_two, 22)));

            $fileName_2= hexdec(uniqid()).".".$file_2->getClientOriginalExtension();
            Image::make($file_2)->resize(540,607)->save('upload/project_images/'.$fileName_2);
            $saveUrl_2='http://127.0.0.1:8000/upload/project_images/'.$fileName_2;

            $data->project_img_two = $saveUrl_2;
        }

        $data->save();

        $notification = array(
            'message' => 'Projects updated succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.project')->with($notification);
    }

    public function DeleteProject($id){
        $deleteData = Projects::findOrFail($id);
        $deleteImg_1 = substr($deleteData->project_img_one, 22);
        $deleteImg_2 = substr($deleteData->project_img_two, 22);
        @unlink(public_path($deleteImg_1));
        @unlink(public_path($deleteImg_2));
        $deleteData->delete();

        $notification = array(
            'message' => 'Projects deleted succesfully',
            'alert-type'=> 'warning',
        );
        return redirect()->route('all.project')->with($notification);
    }

}
