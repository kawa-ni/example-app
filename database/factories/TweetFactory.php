<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>1,//投稿ユーザーIDを1とする
            'content'=>$this->faker->realText(100),//100文字の文章をランダム生成する
            'created_at'=>Carbon::now()->yesterday()
        ];
    }
}
