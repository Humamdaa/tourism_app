<?php

namespace App\Services\auth\ResetPassword;

use App\Models\User;
use App\Notifications\resetPass\ResetPassword;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SendCode
{
    public function sendResetLinkEmail(Request $request)
    {
        $tr = new TranslateMessages();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $tr->translate($validator->errors()),
                'status' => 404], 404);//422
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Send the reset password notification
            $user->notify(new ResetPassword($user));

            return response()->json([
                'message' => $tr->translate('Check your email to reset your password'),
                'status' => 200], 200);
        } else {
            // If user not found
            return response()->json([
                'message' => $tr->translate('User not found')
            ], 404);
        }
    }
}
