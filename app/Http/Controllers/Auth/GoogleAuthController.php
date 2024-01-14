<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Throwable;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('email', $google_user->getEmail())->first();

            if (!$user) {
                $newUser = User::create([
                    'email'     => $google_user->getEmail(),
                    'username'  => $google_user->getName(),
                    'google_id' => $google_user->getId(),
                ]);

                Auth::login($newUser);
            } else {
                Auth::login($user);
            }

            return redirect()->intended('/home');
        } catch (\Throwable $th) {
            dd('ERROR: ' . $th->getMessage());
        }
    }
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
}
    