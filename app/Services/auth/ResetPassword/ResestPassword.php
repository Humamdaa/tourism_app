<?php

namespace App\Services\auth\ResetPassword;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ResestPassword
{
    public function reset(Request $request)
    {
        $status = false;
//        return $request;
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|min:4',
            'code' => 'required',
            'password' => [
                'confirmed',
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                'max:32'
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

//         event(new PasswordReset($user));

        if ($status) {
            return response()->json(['message' => 'Your password has been reset successfully.'], 201);
        } else {
            return response()->json(['error' => 'Invalid email or reset code.'], 422);
        }
    }

}
