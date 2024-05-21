<?php

namespace App\Services\auth;

use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Login
{
    public function login(Request $request)
    {
        $tr = new TranslateMessages();

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                'max:32'
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $tr->translate($validator->errors()->first()),
                'status' => 404], 404);//422
        }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user) {//&& property_exists($user, 'verified_account') && $user->verified_account === 1
                if ($user->verified_account === 1) {

                    $token = $user->createToken('MyApp')->accessToken;

                    $user->setRememberToken(Str::random(60));

                    return response()->json([
                        'token' => $token,
                        'message' => $tr->translate('login successfully'),
                        'status' => 200
                    ], 200);
                }
            }
            return response()->json([
                'message' => $tr->translate('you must verify account'),
                'status' =>404//201
            ], 404);
        }

        return response()->json([
            'message' => $tr->translate('Unauthorized'),
            'status' => 404], 404);//401
    }

}
