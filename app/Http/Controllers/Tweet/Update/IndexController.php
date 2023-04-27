<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;//DBをPHPで操作
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;//404notfoundを出す
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;//403ForBiddenを出す
use App\Services\TweetService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {
        $tweetId=(int) $request->route('tweetId');
        // dd($tweetId);//確認用表示

        if(!$tweetService->checkOwnTweet($request->user()->id,$tweetId)){
            throw new AccessDeniedHttpException();
        }


        //指定したtweetIdがDBのidにある場合はtweetに代入、ない場合は代入せず404notfoundを表示
        /*//長いver
        $tweet=Tweet::where('id',$tweetId)->first();
        if(is_null($tweet)){
            throw new NotFoundHttpException('存在しないつぶやきです');
        }*/
        //短いver
        $tweet=Tweet::where('id',$tweetId)->firstOrFail();
        //dd($tweet);//確認

        //編集を送信して適応させるルートを呼び出す
        return view('tweet.update')->with('tweet',$tweet);

    }
}
