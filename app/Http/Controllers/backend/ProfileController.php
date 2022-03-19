<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view ('backend.profile.view_profile',compact('user'));
    }

    public function ProfileEdit(){
        //we are editing a logged in user
        $id=Auth::user()->id;
        $editData=User::find($id);
        return view ('backend.profile.edit_profile',compact('editData'));


    }

    public function ProfileStore(Request $request){
        $data=User::find(Auth::user()->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->mobile=$request->mobile;
        $data->gender=$request->gender;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/user_images'.$data->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image']=$filename;

        }

        $data->save();
        $notification=array(
            'message'=>'User Profile Updated Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('profile.view')->with($notification);
    }

    public function PasswordView(){
        return view('backend.profile.edit_password');
    }

    public function PasswordUpdate(Request $request){
        $validatedDate=$request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',

        ]);

        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->Save();
            Auth::logout();
            return redirect()->route('login');

        }
        else{
            return redirect()->back();
        }
    }
}
