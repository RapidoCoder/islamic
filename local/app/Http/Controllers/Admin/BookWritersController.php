<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BookWriter;
use Validator;
use Auth;
use File;

class BookWritersController extends Controller
{
    /**
    * display all books writers to manage
    */
    public function index(){
      $writers = BookWriter::all();
      $breadcrumb = array(
        array(
          'title'=>'control panel',
          'homeIcon'=>true,
          'rightSide'=>true,
          'url'=>'admin-dashboard'
          ),
        array(
          'title'=>'Books Writers List',
          'homeIcon'=>true,
          'rightSide'=>false,
          'url'=>'admin-book-writers'
          )
        );
      return view('admin.writers.index')->with('writers', $writers)->with("title", "Book Writer List")->with("breadcrumb", $breadcrumb);
    }
   /**
    * Add book category
    */
   public function add(Request $request){
    if($request->isMethod('post')){

      $validator = Validator::make($request->all(), [
        'name' => 'required|unique:book_writers',
        'description' => 'required'
        ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }else{
        $insert = BookWriter::insert(array('name' => $request->input('name'), 'description'=> $request->input('description')));
        if($insert){
         $msgs = array("type" => "alert alert-success",
          "msg" => "Record Inserted Successfully");
         return redirect()->route('admin-book-writers')->with('msgs', $msgs);
       }else{
        $msgs = array("type" => "alert alert-danger",
          "msg" => "Problem Saving Record");
        return redirect()->back()->with('msgs', $msgs);
      }
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
      'title'=>'Book Writers List',
      'homeIcon'=>true,
      'rightSide'=>true,
      'url'=>'admin-book-writers'
      ),
    array(
      'title'=>'Add Book Writer',
      'homeIcon'=>true,
      'rightSide'=>false,
      'url'=>'admin-add-book-writer'
      )
    );
  return view('admin.writers.add')->with("title", "Add Book Writer")->with('title','Add Book Writer')->with("breadcrumb", $breadcrumb);


}
public function update($id, Request $request){
  $writer = BookWriter::find($id);
  if($writer){
    if($request->isMethod('post')){
      $validator = Validator::make($request->all(), [
        'name' => 'required|unique:book_writers,name,'.$id,
        'description' => 'required'
        ]);

      if ($validator->fails()) {

        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }else{

        $writer->name = $request->input('name');
        $writer->description = $request->input('description');
        $writer->save();

        $msgs = array("type" => "alert alert-success",
          "msg" => "Record  Successfully Updated");
        return redirect()->route('admin-book-writers')->with('msgs', $msgs);
      }

    }else{
     $breadcrumb = array(
      array(
        'title'=>'control panel',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-dashboard'
        ),
      array(
        'title'=>'Book Writers List',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-book-writers'
        ),
      array(
        'title'=>'Update Book Writer',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-update-book-writer'
        )
      );

     return view('admin.writers.update')->with('title', 'Update Writer')->with('breadcrumb', $breadcrumb)->with('writer', $writer);
   }


 }else{
   $msgs = array("type" => "alert alert-danger",
    "msg" => "Record Not Found");
   return redirect()->route('admin-book-writers')->with('msgs', $msgs);
 }
 
}
public function delete($id){
  $writer = BookWriter::find($id);
  $msgs = array();
  if($writer){
    $writer->delete();
    $msgs['type'] = "alert alert-danger";
    $msgs['msg'] = "Record Successfully Deleted";
   
    
  }else{
     $msgs['type'] = "alert alert-danger";
    $msgs['msg'] = "Record Not Found";
  
  
 }
  return redirect()->route('admin-book-writers')->with('msgs', $msgs);
}
}
