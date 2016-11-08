<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Hash;

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
 }
