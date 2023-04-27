<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $browser->visit('/login')
                    ->type('email', $user->email)//メアド入力
                    ->type('password', 'password')//パスワード入力
                    ->press('LOG IN')//「LOG IN」ボタンをクリックする
                    ->assertPathIs('/tweet')//tweetに遷移したことを確認する
                    ->assertSee('つぶやきアプリ');
        });
    }
}
