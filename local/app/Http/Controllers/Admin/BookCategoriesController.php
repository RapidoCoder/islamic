<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BookCategory;

class BookCategoriesController extends Controller
{
  /**
    * display all books to manage
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
    * Add book
    */
   public function add(){
    echo "add";
   }
}
