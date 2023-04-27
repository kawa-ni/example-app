<?php

namespace Tests\Feature\Tweet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tweet;

class DeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     * @return void
     */
    use RefreshDatabase;
    public function test_delete_successed(): void
    {
        //デフォルト
        // $response = $this->get('/');
        // $response->assertStatus(200);//ステータスが200か確認

        $user=User::factory()->create();//ユーザー作成
        $tweet=Tweet::factory()->create(['user_id'=>$user->id]);//つぶやき作成
        $this->actingAs($user);//指定したユーザーでログイン
        $response = $this->delete('/tweet/delete/' . $tweet->id);//作成したつぶやきIDを指定
        $response->assertRedirect('/tweet');//tweetにリダイレクトしたかを確認

    }
}
