<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('商品ID');
            $table->string('title',255)->nullable(false)->comment('商品名');
            $table->text('explain')->nullable(false)->comment('商品説明');
            $table->integer('amount')->length(11)->nullable(false)->comment('金額');
            $table->integer('display_flg')->length(11)->default(0)->nullable(false)->comment('表示フラグ');
            $table->string('img_path',255)->nullable(false)->comment('画像PATH');
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
        Schema::dropIfExists('goods');
    }
}
