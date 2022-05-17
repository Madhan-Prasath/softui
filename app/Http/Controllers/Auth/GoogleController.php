<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class GoogleController extends Controller


{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user     = Socialite::driver('google')->user();

            $finduser = User::where('email', $user->email)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/home');

            }else{
                   $newUser    = User::create([
                    'name'     => $user->name,
                    'email'    => $user->email,
                    'password' => Str::random(32),

                ]);

                Auth::login($newUser);

                return redirect('/home');
            }

        } catch (InvalidStateException $e) {
            return redirect('/session')->withErrors([
                'email' => [
                    __('Google login failed , please try again')
                ]
            ]);
        }
    }
}
