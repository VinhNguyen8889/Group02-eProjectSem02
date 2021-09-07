<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;

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
}
