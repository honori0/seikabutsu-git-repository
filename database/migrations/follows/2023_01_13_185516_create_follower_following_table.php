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
        Schema::create('account_account', function (Blueprint $table) {
             //account_idとaccount_idを外部キーに設定
            $table->foreignId('follower_id')->constrained('accounts');   //参照先のテーブル名を
            $table->foreignId('following_id')->constrained('accounts');    //constrainedに記載
            $table->primary(['follower_id', 'following_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_account');
    }
};
