<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\BookComment;
use Auth;
use Validator;
class BookCommentsController extends Controller
{
  public function submitComment(Request $request){
    if($request->isMethod('post')){
      $validator = Validator::make($request->all(), [
        'comment'=>'Required'
        ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }else{
        $book_id = $request->input('book_id');
        $user_id = Auth::guard('user')->user()->id;
        $comment = $request->input('comment');
        $book_comment = new BookComment;
        $book_comment->book_id = $book_id;
        $book_comment->user_id = $user_id;
        $book_comment->comments = $comment;
        $book_comment->save();
          $msgs = array("type" => "alert alert-success",
          "message" => "Successfully Commented");
        return redirect()->back()->with('msg', $msgs);  
      }
      
    }
  }
}
