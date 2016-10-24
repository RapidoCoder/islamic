<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookComment extends Model
{
 protected $dates = ['created_at', 'updated_at'];
 public function user() {
   return  $this->belongsTo('App\User');
 }
 public function book() {
   return  $this->belongsTo('App\Book');
 }
}
