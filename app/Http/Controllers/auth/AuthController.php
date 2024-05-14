<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Jobs\send\SendVerificationEmailJob;
use App\Models\User;
use App\Notifications\activeAccount\Active;
use App\Services\auth\Login;
use App\Services\auth\Logout;
use App\Services\auth\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $registerService = new Register();
        return $registerService->register($request);
    }

    public function login(Request $request)
    {
        $loginService = new Login();
        return $loginService->login($request);
    }

    public function logout()
    {
        $logoutService = new Logout();
        return $logoutService->logoutUser();
    }

}
