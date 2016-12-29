<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BookCategory;
use Validator;


class BookCategoriesController extends Controller
{
  /**
    * display all books categories to manage
    */
  public function index(){
    $book_categories = BookCategory::all();
    $breadcrumb = array(
      array(
        'title'=>'control panel',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-dashboard'
        ),
      array(
        'title'=>'Books Categories List',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-book-categories'
        )
      );
    return view('admin.categories.index')->with('categories', $book_categories)->with("title", "Book Categories List")->with("breadcrumb", $breadcrumb);
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
        $insert = BookCategory::insert(array('name' => $request->input('name'), 'description'=> $request->input('description')));
        if($insert){
         $msgs = array("type" => "alert alert-success",
          "msg" => "Record Inserted Successfully");
         return redirect()->route('admin-book-categories')->with('msgs', $msgs);
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
      'title'=>'Book Categories List',
      'homeIcon'=>true,
      'rightSide'=>true,
      'url'=>'admin-book-categories'
      ),
    array(
      'title'=>'Add Book Category',
      'homeIcon'=>true,
      'rightSide'=>false,
      'url'=>'admin-add-book-category'
      )
    );
   return view('admin.categories.add')->with("title", "Add Book Category")->with('title','Add Book Category')->with("breadcrumb", $breadcrumb);
 

}
public function update($id, Request $request){
  $category = BookCategory::find($id);
  if($category){
    if($request->isMethod('post')){
      $validator = Validator::make($request->all(), [
        'name' => 'required|unique:book_categories,name,'.$id,
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
         return redirect()->route('admin-book-categories')->with('msgs', $msgs);
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
        'title'=>'Book Categories List',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-book-categories'
        ),
      array(
        'title'=>'Update Book Category',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-update-book-category'
        )
      );

     return view('admin.categories.update')->with('title', 'Update Category')->with('breadcrumb', $breadcrumb)->with('category', $category);
   }


 }else{
   $msgs = array("type" => "alert alert-danger",
    "msg" => "Record Not Found");
   return redirect()->route('admin-book-categories')->with('msgs', $msgs);
 }
 
}
public function delete($id){
  $category = BookCategory::find($id);
  if($category){
    $category->delete();
    $msgs = array("type" => "alert alert-danger",
      "msg" => "Record Successfully Deleted");
    return redirect()->route('admin-book-categories')->with('msgs', $msgs);
  }else{
   $msgs = array("type" => "alert alert-danger",
    "msg" => "Record Not Found");
   return redirect()->route('admin-book-categories')->with('msgs', $msgs);
 }
}
}
