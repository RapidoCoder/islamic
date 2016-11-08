<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\VideoCategory;
use Validator;

class VideoCategoriesController extends Controller
{
  /**
    * display all books categories to manage
    */
  public function index(){
    $categories = VideoCategory::all();
    $breadcrumb = array(
      array(
        'title'=>'control panel',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-dashboard'
        ),
      array(
        'title'=>'Video Categories List',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-video-categories'
        )
      );
    return view('admin.video-categories.index')->with('categories', $categories)->with("title", "Video Categories List")->with("breadcrumb", $breadcrumb);
  }
   /**
    * Add book category
    */
   public function add(Request $request){
    if($request->isMethod('post')){

      $validator = Validator::make($request->all(), [
        'name' => 'required|unique:book_categories',
        'description' => 'required'
        ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }else{
        $insert = VideoCategory::insert(array('name' => $request->input('name'), 'description'=> $request->input('description')));
        if($insert){
         $msgs = array("type" => "alert alert-success",
          "msg" => "Record Inserted Successfully");
         return redirect()->route('admin-video-categories')->with('msgs', $msgs);
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
      'title'=>'Video Categories List',
      'homeIcon'=>true,
      'rightSide'=>true,
      'url'=>'admin-video-categories'
      ),
    array(
      'title'=>'Add Video Category',
      'homeIcon'=>true,
      'rightSide'=>false,
      'url'=>'admin-add-video-category'
      )
    );
   return view('admin.video-categories.add')->with("title", "Add Video Category")->with('title','Add Video Category')->with("breadcrumb", $breadcrumb);
 

}
public function update($id, Request $request){
  $category = VideoCategory::find($id);
  if($category){
    if($request->isMethod('post')){
      $validator = Validator::make($request->all(), [
        'name' => 'required|unique:video_categories,name,'.$id,
        'description' => 'required'
        ]);

      if ($validator->fails()) {
      
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }else{
        
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
       
         $msgs = array("type" => "alert alert-success",
          "msg" => "Record  Successfully Updated");
         return redirect()->route('admin-video-categories')->with('msgs', $msgs);
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
        'title'=>'Video Categories List',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-video-categories'
        ),
      array(
        'title'=>'Update Book Category',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-update-video-category'
        )
      );

     return view('admin.video-categories.update')->with('title', 'Update Category')->with('breadcrumb', $breadcrumb)->with('category', $category);
   }


 }else{
   $msgs = array("type" => "alert alert-danger",
    "msg" => "Record Not Found");
   return redirect()->route('admin-video-categories')->with('msgs', $msgs);
 }
 
}
public function delete($id){
  $category = VideoCategory::find($id);
  if($category){
    $category->delete();
    $msgs = array("type" => "alert alert-danger",
      "msg" => "Record Successfully Deleted");
    return redirect()->route('admin-video-categories')->with('msgs', $msgs);
  }else{
   $msgs = array("type" => "alert alert-danger",
    "msg" => "Record Not Found");
   return redirect()->route('admin-video-categories')->with('msgs', $msgs);
 }
}
}
