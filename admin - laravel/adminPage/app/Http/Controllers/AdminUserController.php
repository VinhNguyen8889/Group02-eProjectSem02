<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function logout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $result = User::find($id);

        return view('backend/user/user_profile', compact('result'));
    }

    public function UserProfileEdit(){
        $id = Auth::user()->id;
        $result = User::find($id);

        return view('backend/user/user_profile_edit', compact('result'));
        
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        } 

        $data->save();

        $notification = array(
            'message' => 'User Profile updated succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('user.profile')->with($notification);
        
    }

        public function PasswordEdit(){
            $id = Auth::user()->id;
            $result = User::find($id);

            return view('backend/user/change_password', compact('result'));
        }

        public function PasswordUpdate(Request $request){
            $validateData = $request->validate([
                'current_password' => 'required',
                'password' => 'required|confirmed',
            ]);

            $hashPassword = Auth::user()->password;
            if(Hash::check($request->current_password, $hashPassword)){
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();

                $notification = array(
                    'message' => 'Password updated succesfully',
                    'alert-type'=> 'success',
                );

                return redirect()->route('admin.logout')->with($notification);
            } else {
                return redirect()->back();
            }

        }
}
