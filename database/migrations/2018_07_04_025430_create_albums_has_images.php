<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsHasImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums_has_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('albums_id')->unsigned()->nullable();
            $table->foreign('albums_id')
                ->references('id')->on('albums');
            $table->integer('images_id')->unsigned()->nullable();
            $table->foreign('images_id')
                ->references('id')->on('images');
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
        Schema::dropIfExists('albums_has_images');
    }
}
