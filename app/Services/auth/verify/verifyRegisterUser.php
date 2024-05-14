<?php

namespace App\Services\auth\verify;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class verifyRegisterUser
{
    public function verifyAccount(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $currentTime = Carbon::now(); // Get the current time
        $expiresAt = Carbon::parse($user->verification_code_expires_at); // Parse the expires_at time from database

        if ($expiresAt->lessThan($currentTime) && $user->verification_code_expires_at !== null) {
            $user->delete();
            return response()->json(['message' => 'you take along time to verify your account']);
        }
        elseif( $request->code !== $user->verification_code){
            return response()->json(['message'=>'the code that entered is incorrect, please register again'],201);
        }

        $access = $user->createToken('MyApp');

        //remove verification code after entering user to app
        $user->verification_code = null;
        $user->verification_code_expires_at = null;
        $user->verified_account = true;
        // Generate remember token
        $user->createRememberToken();
        $user->save();
        return response()->json([
            'message' => 'register successfully',
            'token' => $access->accessToken,
            'status'=>200,
        ],200);
    }
}
