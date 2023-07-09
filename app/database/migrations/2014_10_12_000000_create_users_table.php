<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255)->nullable(false)->comment('名前');
            $table->string('email',255)->unique()->nullable(false)->comment('メールアドレス');
            $table->string('tel',255)->nullable(false)->comment('電話番号');
            $table->integer('adnumber')->length(11)->nullable(false)->comment('郵便番号');
            $table->string('adress',255)->nullable(false)->comment('住所');
            $table->string('password',255)->nullable(false)->comment('パスワード');
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
        $table->dropColumn('tel');
    }
}
