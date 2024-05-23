<?php

namespace App\Services\auth\verify;

use App\Models\User;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Carbon\Carbon;

class verifyRegisterUser
{
    public function verifyAccount(Request $request)
    {
        $tr = new TranslateMessages();

        $user = User::where('email', $request->email)->first();

        $currentTime = Carbon::now(); // Get the current time
        $expiresAt = Carbon::parse($user->verification_code_expires_at); // Parse the expires_at time from database

        if ($expiresAt->greaterThan($currentTime) && $user->verification_code_expires_at !== null) {
            $user->delete();
            return response()->json([
                'message' => $tr->translate('you take along time to verify your account'),
                'status' => 404
            ], 404);//500
        } elseif ($request->code !== $user->verification_code) {
            return response()->json([
                'message' => $tr->translate('the code that entered is incorrect, please register again'),
                'status' => 404//201
            ], 404);
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
            'message' => $tr->translate('register successfully'),
            'token' => $access->accessToken,
            'status' => 200,
        ], 200);
    }
}
