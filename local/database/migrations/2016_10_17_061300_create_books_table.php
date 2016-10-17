<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('books', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('category_id')->unsigned();
        $table->foreign('category_id')->references('id')->on('book_categories')->onDelete('cascade');
        $table->string('title');
        $table->string('image');
        $table->string('url');
        $table->text('description');
        $table->timestamp('created_at');
        $table->string('posted_by');
        $table->integer('posted_id');
        $table->boolean('status');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('books');
    }
  }
