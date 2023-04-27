<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            //userテーブルのidカラムにuser_idカラムを関連付ける
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->dropForeign('tweets_user_id_foreign');//外部キー削除
            $table->dropColumn('user_id');//カラムの削除
        });
    }
};
