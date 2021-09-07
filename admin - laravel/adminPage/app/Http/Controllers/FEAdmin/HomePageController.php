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

}
