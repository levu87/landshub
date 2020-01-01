<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuAnGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('du_an_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('du_an_id')->unsigned();
            $table->foreign('du_an_id')->references('id')->on('du_an');
            $table->string('orignal_filename', 500);
            $table->string('image', 500);
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
        Schema::dropIfExists('du_an_gallery');
    }
}
