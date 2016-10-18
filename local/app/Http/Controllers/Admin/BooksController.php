<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use App\BookCategory;
use App\BookWriter;
use Validator;
use Auth;
use File;

class BooksController extends Controller
{
  private $destinationPath = "assets/media/books/";
  /**
    * display all books to manage
    */
  public function index(){
    $books = Book::all();
    $breadcrumb = array(
      array(
        'title'=>'control panel',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-dashboard'
        ),
      array(
        'title'=>'Books List',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-books'
        )
      );
    return view('admin.books.index')->with('books', $books)->with("title", "Books List")->with("breadcrumb", $breadcrumb);
  }
  /**
  *Add Book
  *
  */

  public function add(Request $request){
    if($request->isMethod('post')){
      $validator = Validator::make($request->all(), [
       'category_id'=>'Required|not_in:0',
       'writer_id'=>'Required|not_in:0',
       'title' => 'required',
       'image' => 'required|image',
       'url' => 'required',
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

        $book = new Book;
        $book->category_id = $request->input('category_id');
        $book->writer_id = $request->input('writer_id');
        $book->title = $request->input('title');
        $book->image = $name;
        $book->description = $request->input('description');
        $book->posted_by = 'admin';
        $book->posted_id = Auth::guard('admin')->user()->id;
        $book->status = true;
        $book->url = $request->input('url');
        $book->save();

        $msgs = array("type" => "alert alert-success",
          "msg" => "Record Inserted Successfully");
        return redirect()->route('admin-books')->with('msgs', $msgs); 
      }
    }

    $categories = ["0" => "Please Select Any Category"] +  BookCategory::pluck('name', 'id')->toArray();
    $writers = ["0" => "Please Select Any Writer"] +  BookWriter::pluck('name', 'id')->toArray();
    $breadcrumb = array(
      array(
        'title'=>'control panel',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-dashboard'
        ),
      array(
        'title'=>'Books List',
        'homeIcon'=>true,
        'rightSide'=>true,
        'url'=>'admin-books'
        ),
      array(
        'title'=>'Add Book',
        'homeIcon'=>true,
        'rightSide'=>false,
        'url'=>'admin-add-book'
        )
      );
    return view('admin.books.add')->with("categories", $categories)->with("writers", $writers)->with("title", "Add Book")->with('title','Add Book')->with("breadcrumb", $breadcrumb);
  }

  public function delete( $id ){
    $book = Book::find($id);
    if($book){
      File::delete($this->destinationPath.$book->image);
      $book->delete();
      $msgs = array("type" => "alert alert-danger",
        "msg" => "Record Successfully Deleted");
      return redirect()->route('admin-books')->with('msgs', $msgs);
    }else{
     $msgs = array("type" => "alert alert-danger",
      "msg" => "Record Not Found");
     return redirect()->route('admin-books')->with('msgs', $msgs);
   }
 }
 public function update( $id, Request $request){
  $book = Book::find( $id );
  if($book != null){

   if($request->isMethod('post')){
    $validator = Validator::make($request->all(), [
     'category_id'=>'Required|not_in:0',
     'writer_id'=>'Required|not_in:0',
     'title' => 'required',
     'url' => 'required',
     'description' => 'required'
     ]);
    if ($validator->fails()) {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }else{

      if($file = $request->file('image')){
        File::delete($this->destinationPath.$book->image);
        $file = $request->file('image');
        $name = time()."-".$file->getClientOriginalName();
        $file->move($this->destinationPath, $name);
        $book->image = $name;
      }
      

      
      $book->category_id = $request->input('category_id');
      $book->writer_id = $request->input('writer_id');
      $book->title = $request->input('title');
      $book->url = $request->input('url');
      $book->description = $request->input('description');
      $book->posted_by = 'admin';
      $book->posted_id = Auth::guard('admin')->user()->id;
      $book->status = true;
      $book->save();

      $msgs = array("type" => "alert alert-success",
        "msg" => "Record Inserted Successfully");
      return redirect()->route('admin-books')->with('msgs', $msgs); 
    }
  }
  /*get method*/

  $categories = ["0" => "Please Select Any Category"] +  BookCategory::pluck('name', 'id')->toArray();
  $writers = ["0" => "Please Select Any Category"] +  BookWriter::pluck('name', 'id')->toArray();
  $breadcrumb = array(
    array(
      'title'=>'control panel',
      'homeIcon'=>true,
      'rightSide'=>true,
      'url'=>'admin-dashboard'
      ),
    array(
      'title'=>'Books List',
      'homeIcon'=>true,
      'rightSide'=>true,
      'url'=>'admin-books'
      ),
    array(
      'title'=>'Add Book',
      'homeIcon'=>true,
      'rightSide'=>false,
      'url'=>'admin-add-book'
      )
    );
  return view('admin.books.update')->with("categories", $categories)->with("writers", $writers)->with('book', $book)->with("title", "Add Book")->with('title','Add Book')->with("breadcrumb", $breadcrumb);

}else{
  $msgs = array("type" => "alert alert-danger",
    "msg" => "Record Not Found");
  return redirect()->route('admin-books')->with('msgs', $msgs);
}
}

}
