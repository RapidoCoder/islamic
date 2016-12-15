<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	public $timestamps = false;
	public function category() {
		return  $this->belongsTo('App\VideoCategory', 'video_category_id');
	}
}
