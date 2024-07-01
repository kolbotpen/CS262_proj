<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Client;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $client = new Client(['verify' => '/CS262_proj/cacert.pem']);
        $googleUser = Socialite::driver('google')
            ->setHttpClient($client)
            ->stateless()
            ->user();

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => \Hash::make(rand(100000, 999999)),
                'provider' => 'Google'
            ]);
        } else {
            $user->update(['provider' => 'Google']);
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
