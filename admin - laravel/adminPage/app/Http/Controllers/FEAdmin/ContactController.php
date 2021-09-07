<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function contactSend(Request $request){

        $ContactArray = json_decode($request->getContent(),true);
        $name = $ContactArray['name'];
        $email = $ContactArray['email'];
        $message = $ContactArray['message'];

        $result = Contacts::insert([
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ]);

        if($result == true){
            return 1;
        } else {
            return 0;
        }

    } //end method
}
