<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuAnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('du_an', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieu_de');
            $table->string('anh_dai_dien');
            $table->longText('mo_ta_ngan');
            $table->string('dia_chi');
            $table->string('lat');
            $table->string('lng');
            $table->tinyInteger('public')->default(0)->comment = '1 là đã ẩn';
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText('bai_viet');
            $table->timestamp('created_at')->useCurrent();
        });
        DB::statement('ALTER TABLE du_an ADD FULLTEXT fulltext_index (tieu_de)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('du_an');
    }
}
