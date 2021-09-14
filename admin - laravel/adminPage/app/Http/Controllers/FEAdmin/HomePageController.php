<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;

class HomePageController extends Controller
{
    public function videoSelect(){
        $result = HomePage::select('video_description','video_url')->get();
        return $result;
    } //end method

    public function totalHomeSelect(){
        $result = HomePage::select('total_student','total_course','total_review')->get();
        return $result;
    } //end method

    public function techHomeSelect(){
        $result = HomePage::select('tech_description')->get();
        return $result;
    } //end method

    public function homeTitleSelect(){
        $result = HomePage::select('home_title','home_subtitle')->get();
        return $result;
    } //end method


    public function AllHome(){
        $result = HomePage::all();
        return view('backend/home/all_home', compact('result'));
    }

    public function AddHome(){
        return view('backend/home/add_home');
    }

    
    public function StoreHome(Request $request){

        $request->validate(
            ['home_title'=>'required',
            'home_subtitle' => 'required',
            'tech_description' => 'required',
            'total_student' => 'required',
            'total_course' => 'required',
            'total_review' => 'required',
            'video_description' => 'required',
            'video_url' => 'required',
        ],
            [
                'home_title.required' => 'Please input Home Title',
                'home_subtitle.required' => 'Please input Home  Subtitle',
                'tech_description.required' => 'Please input Tech Description',
                'total_student.required' => 'Please input Total Student',
                'total_review.required' => 'Please input Total Review',
                'total_course.required' => 'Please input Total Course',
                'video_description.required' => 'Please input Video Description',
                'video_url.required' => 'Please input Video URL',
            ]
        );


        HomePage::insert([
            'home_title'=>$request->home_title,
            'home_subtitle'=>$request->home_subtitle,
            'tech_description'=>$request->tech_description,
            'total_student'=>$request->total_student,
            'total_course'=>$request->total_course,
            'total_review'=>$request->total_review,
            'video_description'=>$request->video_description,
            'video_url'=>$request->video_url,
        ]); 

        $notification = array(
            'message' => 'Home Content created succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.home')->with($notification);
    }


    public function EditHome($id){
        $result=HomePage::findOrFail($id);

        return view('backend/home/edit_home', compact('result'));
    }

    public function UpdateHome(Request $request, $id){

        $request->validate(
            ['home_title'=>'required',
            'home_subtitle' => 'required',
            'tech_description' => 'required',
            'total_student' => 'required',
            'total_course' => 'required',
            'total_review' => 'required',
            'video_description' => 'required',
            'video_url' => 'required',
        ],
            [
                'home_title.required' => 'Please input Home Title',
                'home_subtitle.required' => 'Please input Home  Subtitle',
                'tech_description.required' => 'Please input Tech Description',
                'total_student.required' => 'Please input Total Student',
                'total_review.required' => 'Please input Total Review',
                'total_course.required' => 'Please input Total Course',
                'video_description.required' => 'Please input Video Description',
                'video_url.required' => 'Please input Video URL',
            ]
        );


        $data = HomePage::findOrFail($id);
        $data->home_title = $request->home_title;
        $data->home_subtitle = $request->home_subtitle;
        $data->tech_description = $request->tech_description;
        $data->total_student = $request->total_student;
        $data->total_review = $request->total_review;
        $data->total_course = $request->total_course;
        $data->video_description = $request->video_description;
        $data->video_url = $request->video_url;


        $data->save();

        $notification = array(
            'message' => 'Home Content updated succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.home')->with($notification);
    }

    public function DeleteHome($id){
        $deleteData = HomePage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Home Contents deleted succesfully',
            'alert-type'=> 'warning',
        );
        return redirect()->route('all.home')->with($notification);
    }

}
