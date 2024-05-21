<?php

namespace App\Services\auth;

use App\Services\translate\TranslateMessages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Logout
{
    public function Logout()
    {
        $tr = new TranslateMessages();

        if (Auth::guard('api')->check()) {
            $accessToken = Auth::guard('api')->user()->token();

            DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->id)
                ->update(['revoked' => true]);
            $accessToken->revoke();
        } else
            return response()->json([
                'message' => $tr->translate('Unauthorized'),
                'status' => 404
            ], 404);//401


    }


    public function logoutUser()
    {
        $tr = new TranslateMessages();

        $this->Logout();
        return response()->json([
            'message' => $tr->translate('User logout successfully.'),
            'status' => 404
        ], 404);//201
    }

}
