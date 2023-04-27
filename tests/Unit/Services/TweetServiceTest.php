<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
// use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Services\TweetService;
use Mockery;//呼び出し部分を模擬てきなものに置き換える

class TweetServiceTest extends TestCase
{
    /**
     * 
     * A basic unit test example.
     * @return void
     */
    public function test_check_own_tweet(): void
    {
        $tweetService = new TweetService();

        $mock=Mockery::mock('alias:App\Models\Tweet');//Tweetモデルの模造品を$mockに入れる
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1
        ]);

        $result=$tweetService->checkOwnTweet(1,1);
        $this->assertTrue($result);

        $result=$tweetService->checkOwnTweet(1,1);
        $this->assertTrue($result);
        // $this->assertTrue(true);
    }
}
