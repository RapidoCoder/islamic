<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_category_id')->unsigned();
            $table->foreign('video_category_id')->references('id')->on('video_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('youtube_id');
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
        Schema::drop('videos');
    }
}
