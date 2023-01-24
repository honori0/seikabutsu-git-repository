<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_post', function (Blueprint $table) {
           //account_idとpost_idを外部キーに設定
            $table->foreignId('account_id')->constrained('accounts');   //参照先のテーブル名を
            $table->foreignId('post_id')->constrained('posts');    //constrainedに記載
            $table->primary(['account_id', 'post_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_post');
    }
};
