<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use App\Services\TweetService;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request , TweetService $tweetService)
    {
        //つぶやき投稿のみ
        // $tweet=new Tweet;//Tweetモデルを新規でインスタンス化
        // $tweet->user_id=$request->userId();//UserIdを代入
        // $tweet->content=$request->tweet();//インスタンスrequestのプロパティtweetを、インスタンスtweetのcontentに代入
        // $tweet->save();//保存
        // return redirect()->route('tweet.index');//routeを実行させる。

        //つぶやき投稿と画像保存を同時にする
        $tweetService->saveTweet(
            $request->userId(),
            $request->tweet(),
            $request->images()
        );
        return redirect()->route('tweet.index');
    }
}