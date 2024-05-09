<?php

namespace App\Http\Controllers\verify;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\auth\verify\verifyRegisterUser;

class VerifyRegister extends Controller
{
    public function verifyRegister(Request $request)
    {
        $verifyReg = new verifyRegisterUser();
        return $verifyReg->verifyAccount($request);
    }
}
