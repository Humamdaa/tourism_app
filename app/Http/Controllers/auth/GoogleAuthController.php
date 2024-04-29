<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->getEmail())->first();
            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                ]);

                $new_user->setRememberToken(Str::random(60));
                $access = $new_user->createToken('MyApp')->accessToken;
                Auth::login($new_user);
                return response()->json([
                    'message' => 'login using token is success .',
                    'token' => $access]);

                } else {
                Auth::login($user);
                return response()->json([
                    'message' => 'login using google is failed, the user already is registered.'
                ]);
            }
        } catch (\Throwable $th) {
            dd("something that wrong ! " . $th->getMessage() . "raw :" . $th->getFile() . $th->getLine());
        }
    }
}
