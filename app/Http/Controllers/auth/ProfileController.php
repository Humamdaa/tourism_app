<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Services\auth\Logout;
use FirebaseJWTJWT;
use FirebaseJWTKey;



class ProfileController extends Controller
{
    function editName(Request $request)
    {



        $user = $request->user(); // Access authenticated user object (if middleware is applied)
        if (!$user) {
            return response()->json(['error' => 'User is not authenticated'], 401);
        }

        $user->name = $request->newName;
        return $user->name;
    }
    function deleteAccount(Request $request)
    {
        $user = $request->user();

        $mes = "Account deleted successfully";
        // قم بحذف الحساب
        $result = $user->delete();
        // تحقق إذا كان الحذف ناجحًا
        if ($result) {
            // قم بتسجيل خروج المستخدم لتجنب مشاكل الauthentication
            // إرجاع رسالة النجاح
            $delete_token = new Logout();
            $delete_token->Logout();
            return response()->json(['error' => 'account deleted sucssecfully'], 500);
        } else {
            // إرجاع رسالة الفشل
            return response()->json(['error' => 'Failed to delete account'], 500);
        }
    }
}
