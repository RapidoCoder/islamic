<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use Carbon\Carbon;
use App\BookCategory;
use App\BookWriter;
use App\BookComment;
class BooksController extends Controller
{
  public function index(){

   $books =  Book::orderBy('id', 'desc')->paginate(15);
   $breadcrumb = array(
    array(
      'title'=>'control panel',
      'homeIcon'=>true,
      'rightSide'=>true,
      'url'=>'admin-dashboard'
      ),
    array(
      'title'=>'Books List',
      'homeIcon'=>false,
      'rightSide'=>false,
      'url'=>'books'
      )
    );
   return view('frontend/books/index')->with('title', 'Books List')->with('breadcrumb', $breadcrumb)->with('books', $books);
 }
 public function booksByCategory($id){
   $books =  Book::where('category_id', '=', $id)->orderBy('id', 'desc')->paginate(15);
   $category_name = BookCategory::where('id', '=', $id)->first();
   if($category_name == null){
    $categoryName =  "undefiined";
  }else{
    $categoryName = $category_name->name;
  }


  $breadcrumb = array(
    array(
      'title'=>'control panel',
      'homeIcon'=>true,
      'rightSide'=>true,
      'url'=>'admin-dashboard'
      ),
    array(
      'title'=>'Books List',
      'homeIcon'=>false,
      'rightSide'=>false,
      'url'=>'books'
      )
    );
  return view('frontend/books/index')->with('title', 'Books By Category '. $categoryName)->with('breadcrumb', $breadcrumb)->with('books', $books);
}
public function booksByWriter($id){
 $books =  Book::where('writer_id', '=', $id)->orderBy('id', 'desc')->paginate(15);
 $writer_name = BookWriter::where('id', '=', $id)->first();
 if($writer_name == null){
  $writerName =  "undefiined";
}else{
  $writerName = $writer_name->name;
}


$breadcrumb = array(
  array(
    'title'=>'control panel',
    'homeIcon'=>true,
    'rightSide'=>true,
    'url'=>'admin-dashboard'
    ),
  array(
    'title'=>'Books List',
    'homeIcon'=>false,
    'rightSide'=>false,
    'url'=>'books'
    )
  );
return view('frontend/books/index')->with('title', 'Books By Writer '. $writerName)->with('breadcrumb', $breadcrumb)->with('books', $books);
}

public function bookDetails($id){
 $comments = array(); 
 $book =  Book::find($id);
 $comments = BookComment::orderBy('id', 'desc')->where('book_id', '=', $id)->get();
 
 if($book == null){
  return redirect()->back();
  }
 

$breadcrumb = array(
  array(
    'title'=>'control panel',
    'homeIcon'=>true,
    'rightSide'=>true,
    'url'=>'admin-dashboard'
    ),
  array(
    'title'=>'Books List',
    'homeIcon'=>false,
    'rightSide'=>false,
    'url'=>'book Detail'
    )
  );
return view('frontend/books/detail')->with('title', 'Book Details ')->with('breadcrumb', $breadcrumb)->with('book', $book)->with('comments', $comments);
}
}
