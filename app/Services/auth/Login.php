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
            $token = $user->createToken('MyApp')->accessToken;

            $user->setRememberToken(Str::random(60));

            return response()->json([
                'token' => $token,
//                'user' => $user,
                'status' => 201
            ], 201);
        }

        return response()->json([
            'message' => 'Unauthorized',
            'status' => 401], 401);
    }

}
