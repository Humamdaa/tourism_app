<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;


class ResetPass extends Controller
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
//      send code to email
            $status = Password::sendResetLink(
                $request->only('email')
            );

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

    public function reset(Request $request)
    {
        $status = false;
//        return $request;
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'code' => 'required',
            'password' => [
                'confirmed',
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('password')) {
                return response()->json(['error' => 'Your password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.'], 422);
            }
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {

            $code = Crypt::decryptString($user->reset_code);
            if ($request->code == $code) {

                // Update the user's password
                $user->password = bcrypt($request->password);

                $user->setRememberToken(Str::random(60));
                $user->reset_code = null;
                $user->save();
                $status = true;

            }
        }

//                event(new PasswordReset($user));

        if ($status) {
            return response()->json(['message' => 'Your password has been reset successfully.'], 201);
        } else {
            return response()->json(['error' => 'Invalid email or reset code.'], 422);
        }
    }


}
