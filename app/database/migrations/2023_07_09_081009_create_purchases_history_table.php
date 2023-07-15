<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->length(11)->nullable(false)->comment('ユーザーID');
            $table->integer('goods_id')->length(11)->nullable(false)->comment('商品ID');
            $table->date('history_date')->nullable(false)->comment('購入日');
            $table->string('purchase_name',255)->nullable(false)->comment('購入者');
            $table->string('tel',255)->nullable(false)->comment('電話番号');
            $table->integer('adnumber')->length(11)->nullable(false)->comment('郵便番号');
            $table->string('adress',255)->nullable(false)->comment('住所');
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
        Schema::dropIfExists('purchases_history');
    }
}
