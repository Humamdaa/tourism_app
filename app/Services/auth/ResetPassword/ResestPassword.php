<?php

namespace App\Services\auth\ResetPassword;

use App\Models\User;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ResestPassword
{
    public function reset(Request $request)
    {
        $tr = new TranslateMessages();

        $status = false;
//        return $request;
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|min:4',
            'code' => 'required|numeric|digits:6',
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
                return response()->json([
                    'message' => $tr->translate('Your password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.'),
                    'status' => 404], 404);//422
            }
            return response()->json([
                'message' => $tr->translate($validator->errors()),
                'status' => 404], 404);//422
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
            return response()->json([
                'message' => $tr->translate('Your password has been reset successfully.'),
                'status' => 200], 200);
        } else {
            return response()->json([
                'message' => $tr->translate('Invalid email or reset code.'),
                'status' => 404], 404);//422
        }
    }

}
