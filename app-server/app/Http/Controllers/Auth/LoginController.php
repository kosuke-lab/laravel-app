<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    protected function redirectTo() {
        session()->flash('msg_success', 'ログインしました');
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    protected function loggedOut()
    {
        session()->flash('msg_danger','ログアウトしました。');
        return redirect('/');
    }
    
    public function redirectToProvider($provider)
    {
        //Socialiteを利用して$provider変数のSNSへリダイレクト
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
         //各SNSからログイン情報取得
        try {
            $providerUser = Socialite::driver($provider)->user();
         } catch(Exception $e) {
             return redirect('/login')->with('oauth_error', '予期せぬエラーが発生しました');
         }

        $myinfo = User::firstOrCreate([
            //SNSID取得
            'name' => $providerUser->nickname,

            //SNSのメールアドレス取得
            'email' => $providerUser->getEmail(),

            //SNSログインユーザーに一般ユーザーの権限付与
            'role' => 'user'
            ]);
                 Auth::login($myinfo);
                 return redirect()->to('/'); 

    }
}
