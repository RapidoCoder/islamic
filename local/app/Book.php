<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  public $timestamps = false;
   protected $dates = ['created_at', 'updated_at'];
  
  public function category() {
   return  $this->belongsTo('App\BookCategory');
  }
   public function writer() {
   return  $this->belongsTo('App\BookWriter');
  }
    public function commentsCount() {
   return  $this->hasOne('App\BookComment')->selectRaw('book_id, count(*) as count');
  }
}
