<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;//DBをPHPで操作
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;//404notfoundを出す
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;//403ForBiddenを出す
use App\Services\TweetService;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {
        $tweetId=(int) $request->route('tweetId');

        if(!$tweetService->checkOwnTweet($request->user()->id,$tweetId)){
            throw new AccessDeniedHttpException();
        }

        // $tweet=Tweet::where('id',$tweetId)->firstOrFail();
        // $tweet->delete();
        // return redirect()
        //     ->route('tweet.index')
        //     ->with('feedback.success',"つぶやきを削除しました");

        $tweetService->deleteTweet($tweetId);
        return redirect()
            ->route('tweet.index')
            ->with('feedback.success',"つぶやきを削除しました");
    }
}
