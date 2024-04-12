<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\register\welcome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        //'nullable|phone:AUTO|unique:users',
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) {
                    // Custom phone number validation
                    if (!preg_match('/^\+\d{9,15}$/', $value)) {
                        $fail('Please enter a valid phone number in the format +1234567890.');
                    }
                },
                'unique:users',
            ],
            'password' => [
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

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash::make($request->password),
            'phone' => $request->phone
        ];

        // Use createOrFail to handle database exceptions
        try {
            $user = User::create($userData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not create user.'], 500);
        }

        $access = $user->createToken('MyApp');

        Mail::to($user->email)->send(new welcome());


        return response()->json([
            'token' => $access->accessToken, // Get the encrypted access token string
            'user' => $user,
            'status' => 201
        ], 201);
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            $user->setRememberToken(Str::random(60));

            return response()->json([
                'token' => $token,
                'user' => $user,
                'status' => 201
            ], 201);
        }

        return response()->json([
            'message' => 'Unauthorized',
            'status' => 401], 401);
    }

    public function Logout()
    {
        if (Auth::guard('api')->check()) {
            $accessToken = Auth::guard('api')->user()->token();

            DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->id)
                ->update(['revoked' => true]);
            $accessToken->revoke();

            return response()->json([
                'data' => 'authorized',
                'message' => 'User logout successfully.',
                'status' => 201], 201);
        }
        return response()->json([
            'data' => 'Unauthorized',
            'status' => 401], 401);
    }
}
