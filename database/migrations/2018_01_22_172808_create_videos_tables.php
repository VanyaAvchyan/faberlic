<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            
            $table->string('title_am');
            $table->string('title_ru');
            $table->string('title_en');
            
            $table->text('description_am');
            $table->text('description_ru');
            $table->text('description_en');
            
            $table->string('url_am');
            $table->string('url_ru');
            $table->string('url_en');
            
            $table->string('thumb_am');
            $table->string('thumb_ru');
            $table->string('thumb_en');
            
            $table->timestamps();
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
