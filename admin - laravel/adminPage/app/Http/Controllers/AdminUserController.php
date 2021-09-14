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
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        
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

        // Manage USERs

    public function AllUser(){
    	$data['allData'] = User::where('usertype','Admin')->get();
    	return view('backend/user/all_user',$data);
    }

    public function AddUser(){
    	return view('backend/user/add_user');
    }

    public function StoreUser(Request $request){

    	$validatedData = $request->validate([
    		'email' => 'required|unique:users',
    		'name' => 'required',
            'role' => 'required',
    	]);

    	$data = new User();
        $code = rand(0000,9999);
    	$data->usertype = 'Admin';
        $data->role = $request->role;
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->password = bcrypt($code);
        $data->code = $code;
    	$data->save();

    	$notification = array(
    		'message' => 'User Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.user')->with($notification);

    }


    public function EditUser($id){
        $data = User::findOrFail($id);
    	return view('backend/user/edit_user', compact('data'));
    }

    public function UpdateUser(Request $request, $id){

    	$data = User::findOrFail($id);
    	$data->name = $request->name;
    	$data->email = $request->email;
        $data->role = $request->role;
    	$data->save();

    	$notification = array(
    		'message' => 'User Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.user')->with($notification);

    }


    public function DeleteUSer($id){
    	$user = User::findOrFail($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'User Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.user')->with($notification);

    }

}
