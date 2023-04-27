<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TweetService;
use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {
        //テスト用
        // return 'Single Action!';
	    // return view('tweet.index',['name'=>'laravel'];
	    
	    
	    //p.48あたり、HTMLを表示させる
	    /*return view('tweet.index')//HTML呼び出し
		->with('name','laravel')
		->with('version','8.0');*/

	    //p.68 DBの内容を表示させる
	    // $tweets=Tweet::all();
        // dd($tweets);//DB接続確認用
        //サービスコンテナなし
        // $tweets=Tweet::orderBy('created_at','DESC')->get();
        
        // サービスコンテナあり
        // $tweetService=new TweetService;//__invoke()に因数を渡したら消せる
        $tweets=$tweetService->getTweets();

        //デバック用コード
        // dump($tweets);
        // app(\App\Exceptions\Handler::class)->render(request(),throw new \Error('dump report.'));

        //dd($tweets);//その場で処理を中断して変数の内容などを出力
        return view('tweet.index')
            ->with('tweets',$tweets);
    }
}
