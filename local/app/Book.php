<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  public $timestamps = false;
  
  public function category() {
   return  $this->belongsTo('App\BookCategory');
  }
   public function writer() {
   return  $this->belongsTo('App\BookWriter');
  }
}
