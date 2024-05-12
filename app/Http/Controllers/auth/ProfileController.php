<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

use FirebaseJWTJWT;
use FirebaseJWTKey;



class ProfileController extends Controller
{
    function editName(Request $request)
    {


        
        // return "done";
        try {
            $decryptedToken = Crypt::decryptString($request->token);
        } catch (\Exception $e) {
return "exception there";
        }
        $user = User::findorFail($decryptedToken);
        $user->name = $request->newName;
        return $user->name;
    }
}
