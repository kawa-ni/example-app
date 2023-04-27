<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';//認証関係のルートを記載しているauth.phpを読み込み

//自分でかいたコード
//sampleプログラム内の処理
Route::get('/sample',[\App\Http\Controllers\Sample\IndexController::class,'show']);
Route::get('/sample/{id}',[\App\Http\Controllers\Sample\IndexController::class,'showId']);

//Tweetプログラム内の処理
Route::get('/tweet',\App\Http\Controllers\Tweet\IndexController::class)
    ->name('tweet.index');//DBの内容表示

Route::middleware('auth')->group(function (){//正しくログインしていたら処理できる
    //画面からの入力
    Route::post('/tweet/create',\App\Http\Controllers\Tweet\CreateController::class)
        // ->middleware('auth')//投稿のみログイン状態を確認するときは追加する
        ->name('tweet.create');

    //つぶやき編集
    Route::get('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\IndexController::class)
        ->name('tweet.update.index');//->where('tweetId','[0-9]+');//RouteServiceProviderに書くならwhere不要
    Route::put('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\PutController::class)
        ->name('tweet.update.put');//->where('tweetId','[0-9]+');//更新処理

    //つぶやき削除
    Route::delete('/tweet/delete/{tweetId}',\App\Http\Controllers\Tweet\DeleteController::class)
        ->name('tweet.delete');//つぶやき削除
});
