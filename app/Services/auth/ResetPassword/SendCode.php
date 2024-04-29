<?php

namespace App\Services\auth\ResetPassword;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SendCode
{
    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Send the reset password notification
            $user->notify(new ResetPassword($user));

            return response()->json([
                'message' => 'Check your email',
            ], 201);
        } else {
            // If user not found
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    }
}
