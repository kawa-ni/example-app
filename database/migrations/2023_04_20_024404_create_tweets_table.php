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
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();//tweetの番号
            $table->string('content');//tweet内容文章
            $table->timestamps();//投稿時間
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweets');//指定したテーブルがあれば削除、なければ何もしない（エラーなし）
    }
};
