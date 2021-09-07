<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReview;

class ClientReviewController extends Controller
{
    public function allSelect(){
        $result = ClientReview::all();
        return $result;
    } //end method
}
