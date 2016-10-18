<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('alims', function (Blueprint $table) {
        $table->increments('id');
        $table->string('email');
        $table->string('name');
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
        $table->text('description');
        $table->string('image');
       
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('alims');
    }
  }
