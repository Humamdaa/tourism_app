<?php

namespace App\Services\auth;

use App\Models\User;
use Illuminate\Http\Request;

class verifyRegisterUser
{
    public function verifyAccount(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        //request has expired
        if ($user->verification_code_expires_at < now() && $user->verification_code_epires_at !== null) {
            $user->delete();
            return response()->json(['message' => 'you take along time to verify your account']);
        }
        elseif( $request->code !== $user->verification_code){
            return response()->json(['message'=>'the code that entered is incorrect, please register again']);
        }

        $access = $user->createToken('MyApp');

        //remove verification code after entering user to app
        $user->verification_code = null;

        // Generate remember token
        $user->createRememberToken();
        $user->save();
        return response()->json([
            'message' => 'register successfully',
            'token' => $access->accessToken
        ],201);
    }
}
