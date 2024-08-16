<?php

namespace App\Http\Controllers\Web\login;

use App\Http\Controllers\Controller;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{

    public function login(Request $request)
    {
        $tr = new TranslateMessages();

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                'max:32'
            ],
        ]);

//        return $request;
        if ($validator->fails()) {
            return redirect()->back()->with('error', $tr->translate($validator->errors()->first()));
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user) {//&& property_exists($user, 'verified_account') && $user->verified_account === 1
                if ($user->verified_account === 1) {

                    $token = $user->createToken('MyApp')->accessToken;

                    $user->setRememberToken(Str::random(60));
                    $cookie = cookie('token', $token, 60);

                    Session::put('token', $token);

                    return redirect()->route('city.index')->with('token', $token)->cookie($cookie);
                }
                return redirect()->back()->with('error', 'not found user');
            }
            return redirect()->back()->with('error', 'un auth');
        }
        return redirect()->back()->with('error', $tr->translate('something is wrong(email or password)'));
    }
}
