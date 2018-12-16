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

        return redirect()->route('baton.list');
    }

    private function findOrCreateUser($twitterUser)
    {
        // TODO has(), get() をレポジトリに生やして、それを使って判定するのが綺麗そう
        $authUser = User::where('twitter_id', $twitterUser->id)->first();

        if ($authUser) {
            return $authUser;
        } else {
            $userModel = new User();
            // FYI twitter->name は 変更可能な表示名、nicknameはIDとして認識される変更不可の文字列、IDは数値表現
            $userModel->twitter_id = $twitterUser->id;
            $userModel->name = $twitterUser->nickname;
            $userModel->icon_url = $twitterUser->avatar_original;
            $userModel->save();

            // 上と重複コードになるので直した方が良い気がするが、とりあえずこれで動く気がする
            return User::where('twitter_id', $twitterUser->id)->first();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('baton.list');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}