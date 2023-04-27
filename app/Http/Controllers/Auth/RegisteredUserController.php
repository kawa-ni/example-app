<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Mail\NewUserIntroduction;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Contracts\Mail\Mailer;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Mailer $mailer): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($newUser));//新しくユーザー登録されたときに実行

        Auth::login($newUser);//

        //メール送信処理追加
        
        $allUser=User::get();//全会員の情報を取得
        foreach($allUser as $user){
            $mailer->to($user->email)//送信先を会員全員のメアドに指定
            ->send(new NewUserIntroduction($user,$newUser));//内容をapp/mail/NewUserIntroduction.phpから取ってくる
        }


        return redirect(RouteServiceProvider::HOME);
    }
}
