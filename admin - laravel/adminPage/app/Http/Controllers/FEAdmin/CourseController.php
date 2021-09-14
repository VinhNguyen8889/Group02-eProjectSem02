<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use Image;

class CourseController extends Controller
{
    public function allSelect(){
        $result = Courses::all();
        return $result;
    }

    public function fourSelect(){
        $result = Courses::limit(4)->get();
        return $result;
    }

    public function detailSelect($courseID){
        $result = Courses::where('id', $courseID)->get();
        return $result;
    }

    public function AllCourse(){
        $result = Courses::all();
        return view('backend/course/all_course', compact('result'));
    }

    public function AddCourse(){
        return view('backend/course/add_course');
    }

    
    public function StoreCourse(Request $request){

        $request->validate(
            ['short_title'=>'required',
            'long_title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'small_img' => 'required',
            'total_duration' => 'required',
            'total_lecture' => 'required',
            'total_student' => 'required',
            'skill_all' => 'required',
            'video_url' => 'required',
        ],
            [
                'short_title.required' => 'Please input Course Short Title',
                'long_title.required' => 'Please input Course Long Title',
                'short_description.required' => 'Please input Short Description',
                'long_description.required' => 'Please input Long Description',
                'total_duration.required' => 'Please input Total Duration',
                'total_lecture.required' => 'Please input Total Lecture',
                'total_student.required' => 'Please input Total Student',
                'skill_all.required' => 'Please input Skills',
                'video_url.required' => 'Please input Video URL',
            ]
        );

            $file_1 = $request->file('small_img');
            $fileName_1= hexdec(uniqid()).".".$file_1->getClientOriginalExtension();
            Image::make($file_1)->resize(626,417)->save('upload/course_images/'.$fileName_1);
            $saveUrl_1='http://127.0.0.1:8000/upload/course_images/'.$fileName_1;

        Courses::insert([
            'short_title'=>$request->short_title,
            'long_title'=>$request->long_title,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'small_img'=>$saveUrl_1,
            'total_duration'=>$request->total_duration,
            'total_lecture'=>$request->total_lecture,
            'total_student'=>$request->total_student,
            'skill_all'=>$request->skill_all,
            'video_url'=>$request->video_url,
        ]); 

        $notification = array(
            'message' => 'Courses created succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.course')->with($notification);
    }


    public function EditCourse($id){
        $result=Courses::findOrFail($id);

        return view('backend/course/edit_course', compact('result'));
    }

    public function UpdateCourse(Request $request, $id){

        $request->validate(
            ['short_title'=>'required',
            'long_title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'total_duration' => 'required',
            'total_lecture' => 'required',
            'total_student' => 'required',
            'skill_all' => 'required',
            'video_url' => 'required',
        ],
            [
                'short_title.required' => 'Please input Course Short Title',
                'long_title.required' => 'Please input Course Long Title',
                'short_description.required' => 'Please input Short Description',
                'long_description.required' => 'Please input Long Description',
                'total_duration.required' => 'Please input Total Duration',
                'total_lecture.required' => 'Please input Total Lecture',
                'total_student.required' => 'Please input Total Student',
                'skill_all.required' => 'Please input Skills',
                'video_url.required' => 'Please input Video URL',
            ]
        );


        $data = Courses::findOrFail($id);
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        $data->total_duration = $request->total_duration;
        $data->total_lecture = $request->total_lecture;
        $data->total_student = $request->total_student;
        $data->skill_all = $request->skill_all;
        $data->video_url = $request->video_url;

        if($request->file('small_img')){
            $file_1 = $request->file('small_img');
            @unlink(public_path(substr($data->small_img, 22)));

            $fileName_1= hexdec(uniqid()).".".$file_1->getClientOriginalExtension();
            Image::make($file_1)->resize(626,417)->save('upload/course_images/'.$fileName_1);
            $saveUrl_1='http://127.0.0.1:8000/upload/course_images/'.$fileName_1;

            $data->small_img = $saveUrl_1;
        }


        $data->save();

        $notification = array(
            'message' => 'Courses updated succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.course')->with($notification);
    }

    public function DeleteCourse($id){
        $deleteData = Courses::findOrFail($id);
        $deleteImg_1 = substr($deleteData->small_img, 22);
        @unlink(public_path($deleteImg_1));
        $deleteData->delete();

        $notification = array(
            'message' => 'Courses deleted succesfully',
            'alert-type'=> 'warning',
        );
        return redirect()->route('all.course')->with($notification);
    }

}
