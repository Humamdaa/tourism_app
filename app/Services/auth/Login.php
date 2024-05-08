<?php

namespace App\Services\auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Login
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user ) {//&& property_exists($user, 'verified_account') && $user->verified_account === 1
                if($user->verified_account === 1) {

                    $token = $user->createToken('MyApp')->accessToken;

                    $user->setRememberToken(Str::random(60));

                    return response()->json([
                        'token' => $token,
                        'message' => 'login successfully',
                        'status' => 200
                    ], 200);
                }
            }
            return response()->json(['message' => 'you must verify account'],201);
        }

        return response()->json([
            'message' => 'Unauthorized',
            'status' => 401], 401);
    }

}
