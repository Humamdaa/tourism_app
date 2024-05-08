<?php

namespace App\Services\auth;

use App\Jobs\send\SendVerificationEmailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Register
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20|min:4',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|regex:/^\+\d{9,15}$/|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                'max:32'
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            // Create user
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'verified_account'=>false
            ];
            $user = User::create($userData);

            // If user created successfully, send notification
            if ($user) {
                SendVerificationEmailJob::dispatch($user)->delay(5);

                return response()->json(['message' => 'User registered successfully. Verification code sent on email.'], 200);
            }
        } catch (\Exception $e) {

            return response()->json(['message' => 'An error occurred while registering user.'], 500);
        }

        return response()->json(['message' => 'Could not create user.'], 500);
    }

}
