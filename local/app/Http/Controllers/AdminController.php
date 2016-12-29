<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Hash;
use Validator;
use App\Admin;
class AdminController extends Controller
{
   /**
    * showing login form
    */

   public function index(){
    return view('admin.login');

  }

  /**
   * show  dashboard
   * @return dashboard view
  */

  public function dashboard(){
    $breadCrumb = array(
      array(
        'title'=>'control panel',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-dashboard'
        )
      );
    return view("admin.dashboard")->with("title", "Admin Dashboard")->with("breadcrumb", $breadCrumb);
  }

   /**
   * authentication process
   * @param $request
   * @return login/dashboard routes
  */

   public function authenticate(Request $request){
    $email = $request->input('username');
    $password = $request->input('password');
    if (Auth::guard('admin')->attempt(['name' => $email, 'password' => $password])) {
     return redirect()->route('admin-dashboard');
   }else{
    $msgs = array("type" => "alert alert-danger",
      "msg" => "Wrong username / password");
    return redirect()->route('admin-login')->with("msgs", $msgs);
  }
}
    /**
   * logout
   * @return login form route
  */
    public function logout(){
      if(Auth::guard('admin')->check()){
       Auth::guard('admin')->logout();
       return redirect()->route('admin-login');
     }
   }

   public function settings(){
     $breadCrumb = array(
      array(
        'title'=>'control panel',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-dashboard'
        ),
       array(
        'title'=>'Profile Settings',
        'homeIcon'=>false,
        'rightSide'=>true,
        'url'=>'admin-settings'
        )
      );
     return view("admin.settings")->with("title", "Admin Settings")->with("breadcrumb", $breadCrumb);
   }

   public function changeName(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required'
      ]);
    if ($validator->fails()) {
     return redirect()->back()
     ->withErrors($validator)
     ->withInput();
   }else{
    $admin = Admin::first();
    $admin->name = $request->input("name");
    $admin->save();
    $msgs = array("type" => "alert alert-success",
      "msg" => "successfully updated name");
    return redirect()->route('admin-settings')->with("msgs", $msgs);
  }
}
public function changeEmail(Request $request){
  $validator = Validator::make($request->all(), [
    'email' => 'required|email'
    ]);
  if ($validator->fails()) {
   return redirect()->back()
   ->withErrors($validator)
   ->withInput();
 }else{
  $admin = Admin::first();
  $admin->email = $request->input("email");
  $admin->save();
  $msgs = array("type" => "alert alert-success",
    "msg" => "successfully Email Updated");
  return redirect()->route('admin-settings')->with("msgs", $msgs);
}
}

public function changePassword(Request $request){
  $validator = Validator::make($request->all(), [
    'password' => 'required|min:6',
    'confirm_password' => 'required|same:password'
    ]);
  if ($validator->fails()) {
   return redirect()->back()
   ->withErrors($validator)
   ->withInput();
 }else{
  $admin = Admin::first();
  $admin->password =  Hash::make($request->input("password"));
  $admin->save();
  $msgs = array("type" => "alert alert-success",
    "msg" => "successfully Password Updated");
  return redirect()->route('admin-settings')->with("msgs", $msgs);
}
}
}
