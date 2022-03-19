<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
public function UserView(){
    $users=User::all();
    //multiple
//    $data['alldata']=User::all();
//    $data['alldata']=Userfff::all();
//    return view('backend.user.view_user',$data);
    return view('backend.user.view_user',compact('users'));

}

public function UserAdd(){
    return view('backend.user.view_add');
}
public function UserStore(Request $request){
 $validatedDate=$request->validate([
     'email'=>'required|unique:users',
     'name'=>'required',

     ]);

 $data= new User();
    $data->usertype= $request->usertype;
    $data->name= $request->name;
    $data->email= $request->email;
    $data->password= bcrypt($request->password);
    $data->save();

    $notification=array(
        'message'=>'User Inserted Successfully',
        'alert-type'=>'success',
    );
    return redirect()->route('user.view')->with($notification);


}

public function  UserEdit($id){

    $useredit=User::find($id);
    return view ('backend.user.view_edit',compact('useredit'));

}

public function UserUpdate(Request $request, $id){
    $validatedDate=$request->validate([
        'email'=>'required',
        'name'=>'required',

    ]);

    $data= User::find($id);
    $data->usertype= $request->usertype;
    $data->name= $request->name;
    $data->email= $request->email;
    $data->password= bcrypt($request->password);
    $data->save();

    $notification=array(
        'message'=>'User Updated Successfully',
        'alert-type'=>'success',
    );
    return redirect()->route('user.view')->with($notification);

}

public function UserDelete($id){
    $userdelete=User::find($id)->delete();
    $notification=array(
        'message'=>'User Deleted Successfully',
        'alert-type'=>'info',
    );
    return redirect()->route('user.view')->with($notification);

}


}
