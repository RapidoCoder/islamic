<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Alim;
use Validator;
use Auth;
use File;
use Hash;


class AlimsController extends Controller
{
  private $destinationPath = "assets/media/alims/";
   /**
    * display all alims to manage
    */
   public function index(){
    $alims = Alim::all();
    $breadcrumb = array(
      array(
        'title'=>'control panel',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-dashboard'
        ),
      array(
        'title'=>'Alims List',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-alims'
        )
      );
    return view('admin.alims.index')->with('alims', $alims)->with("title", "Alims List")->with("breadcrumb", $breadcrumb);
  }
  /**
  *Add Book
  *
  */

  public function add(Request $request){
    if($request->isMethod('post')){
      $validator = Validator::make($request->all(), [
       'name'=>'Required',
       'password' => 'Required',
       'confirm_password' => 'Required|same:password',
       'email' => 'Required|email',
       'image' => 'Required|image',
       'description' => 'required'
       ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }else{

        $file = $request->file('image');
        $name = time()."-".$file->getClientOriginalName();
        $file->move($this->destinationPath, $name);

        $alim = new Alim;
      
        $alim->name = $request->input('name');
        $alim->image = $name;
        $alim->password = Hash::make( $request->input('password') );
         $alim->email = $request->input('email');
        
        $alim->description = $request->input('description');
        $alim->save();

        $msgs = array("type" => "alert alert-success",
          "msg" => "Record Inserted Successfully");
        return redirect()->route('admin-alims')->with('msgs', $msgs); 
      }
    }

    $breadcrumb = array(
      array(
        'title'=>'control panel',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-dashboard'
        ),
      array(
        'title'=>'Alims List',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-alims'
        ),
      array(
        'title'=>'Add Alim',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-add-alim'
        )
      );
    return view('admin.alims.add')->with("title", "Add Book")->with('title','Add Alim')->with("breadcrumb", $breadcrumb);
  }

  public function delete( $id ){
    $alim = Alim::find($id);
    if($alim){
      File::delete($this->destinationPath.$alim->image);
      $alim->delete();
      $msgs = array("type" => "alert alert-danger",
        "msg" => "Record Successfully Deleted");
      return redirect()->route('admin-alims')->with('msgs', $msgs);
    }else{
     $msgs = array("type" => "alert alert-danger",
      "msg" => "Record Not Found");
     return redirect()->route('admin-alims')->with('msgs', $msgs);
   }
 }
 
}
