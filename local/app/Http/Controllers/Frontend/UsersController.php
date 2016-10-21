<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;


class UsersController extends Controller
{
  private $destinationPath = "assets/media/users/";
  
  /**
   * custom user reistratoin
   * @param $request
   * @return view page
  */

  public function register(Request $request){
   $email = $request->input("reg_email");
   $name = $request->input("reg_name"); 
   $password = $request->input("reg_password");
   $file = $request->file('reg_image');
   $image_name = time()."-".$file->getClientOriginalName();
   $file->move($this->destinationPath, $image_name);

   if( $this->insertUser($name, $email, $password, $image_name, $this->getToken(), 0)){
     $msg = array("type" => "alert alert-success",
        "message" => "Verificaton Email is sent to Mail");
     return redirect()->route('home')->with('msg', $msg);
   }
 }
   /**
   * check user already register
   * @param $request
   * @return json encoded response of user exist status
  */

   public function userExist(Request $request){
     $user = User::where('email', '=', $request->input('email'))->first();
     if($user == null){
      echo json_encode( ['exist'=>false ] );
    }else{
     echo  json_encode( ['exist' =>true] ); 
   }

 }
 /**
  * Generates Random Token
  * @return random token 
  *
 */
 public function getToken()
 {
  return hash_hmac('sha256', str_random(40), config('app.key'));
}
   /**
   * insert user
   * @param $name, $email, $password, $image
   * @return boolean
  */
   public function insertUser($name, $email, $password, $image, $token, $status){
    $user = new User;
    $user->name = $name;
    $user->email = $email;
    $user->password = Hash::make( $password );
    $user->image = $image;
    $user->token = $token;
    $user->status = $status;
    $user->save();
    return true;
  }
  /**
   * user logout
   * @return previouse route
  */
  public function logout(){
    if(Auth::guard('user')->check()){
     Auth::guard('user')->logout();
     return redirect()->back();
   }
 }
}
