<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->id,
            ])->first();

            if (! $user) {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'username' => User::generateUsername($socialUser->getNickname()),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => bcrypt($socialUser->token),
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user);

            return redirect()->route('blogpost.index');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong with ' . $provider . ' login');
        }
    }
}
