<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

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
}
