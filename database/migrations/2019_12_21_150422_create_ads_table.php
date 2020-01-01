<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieu_de',500);
            $table->integer('gia')->length(10);
            $table->string('don_vi');
            $table->string('anh_dai_dien');
            $table->longText('mo_ta_ngan');
            $table->string('dia_chi');
            $table->string('lat');
            $table->string('lng');
            $table->integer('dien_tich');
            $table->string('slug');
            $table->tinyInteger('danh_muc')->default(0)->comment = '0 là thuê 1 là bán';
            $table->longText('bai_viet');
            $table->integer('id_du_an')->unsigned();
            $table->foreign('id_du_an')->references('id')->on('du_an');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('status')->default(0)->comment = '0 là chưa 1 là đã bán';
            $table->tinyInteger('public')->default(0)->comment = '0 là chờ duyệt 1 là đã';
            $table->tinyInteger('hide')->default(0)->comment = '0 là chưa xóa 1 là đã xóa';
            $table->tinyInteger('pay')->default(0)->comment = '1 là đã trả phí';
            $table->timestamp('created_at')->useCurrent();
        });
        DB::statement('ALTER TABLE ads ADD FULLTEXT fulltext_index (tieu_de)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
