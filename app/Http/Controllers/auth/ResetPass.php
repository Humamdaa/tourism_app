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
use App\Services\auth\ResetPassword\sendCode;
use App\Services\auth\ResetPassword\ResestPassword;

class ResetPass extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $sendCodeResest = new sendCode();
        return $sendCodeResest->sendResetLinkEmail($request);
    }

    public function resetPa(Request $request)
    {
        $reset = new ResestPassword();
        return $reset->reset($request);
    }

}
