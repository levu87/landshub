<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ads_id')->unsigned();
            $table->foreign('ads_id')->references('id')->on('ads');
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
        Schema::dropIfExists('ads_gallery');
    }
}
