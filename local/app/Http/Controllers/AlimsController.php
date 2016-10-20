<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Hash;

class AlimsController extends Controller
{
   /**
    * showing login form
    */

   public function index(){
    return view('alims.login');

  }

  /**
    * show  dashboard
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
       return view("alims.dashboard")->with("title", "Alim Dashboard")->with("breadcrumb", $breadCrumb);
  }

  /**
    * authenticate admin
    * @param $request
    */

  public function authenticate(Request $request){

    $email = $request->input('email');
    $password = $request->input('password');
    if (Auth::guard('alim')->attempt(['email' => $email, 'password' => $password])) {
       return redirect()->route('alim-dashboard');
    }else{
      $msgs = array("type" => "alert alert-danger",
        "msg" => "Wrong username / password");
      return redirect()->route('alim-login')->with("msgs", $msgs);
    }

  }
  /**
    * Logout
    */
    public function logout(){
      if(Auth::guard('alim')->check()){
         Auth::guard('alim')->logout();
         return redirect()->route('alim-login');
      }
    }
}
