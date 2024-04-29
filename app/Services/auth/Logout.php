<?php

namespace App\Services\auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Logout
{
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
