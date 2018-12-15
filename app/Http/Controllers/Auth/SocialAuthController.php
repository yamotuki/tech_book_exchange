<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    /**
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (\Exception $e) {
            return redirect('auth/twitter');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route('offer.list');
    }

    private function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('twitter_id', $twitterUser->id)->first();

        if ($authUser) {
            return $authUser;
        } else {
            $userModel = new User();
            $userModel->name = $twitterUser->name;
            $userModel->show_name = $twitterUser->nickname;
            $userModel->twitter_id = $twitterUser->id;
            $userModel->avatar = $twitterUser->avatar_original;
            $userModel->save();

            // 上と重複コードになるので直した方が良い気がするが、とりあえずこれで動く気がする
            return User::where('twitter_id', $twitterUser->id)->first();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('offer.list');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}