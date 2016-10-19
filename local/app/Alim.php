<?php

namespace App;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Alim extends Authenticatable
{
    //
   protected $table = 'alims';
}
