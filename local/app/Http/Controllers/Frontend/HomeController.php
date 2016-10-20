<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use Carbon\Carbon;

class HomeController extends Controller
{
  public function books(){
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
   return view('frontend/books')->with('title', 'Books List')->with('breadcrumb', $breadcrumb)->with('books', $books);
  }
}
