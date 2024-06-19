<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Services\auth\Logout;


class ProfileController extends Controller
{
    function editName(Request $request)
    {
        $tr = new TranslateMessages();


        $user = $request->user(); // Access authenticated user object (if middleware is applied)
        if (!$user) {
            return response()->json([
                'message' => $tr->translate('User is not authenticated'),
                'status' => 404
            ], 404);//401
        }

        $user->name = $request->newName;
        $user->save();
        return response()->json([
            'message' => $tr->translate("your name is updated successfully to : $user->name"), '
            status' => 200], 200);
    }

    function deleteAccount(Request $request)
    {
        $tr = new TranslateMessages();

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
            return response()->json([
                'message' => $tr->translate('account deleted successfully'),
                'status' => 200], 200);//500
        } else {
            // إرجاع رسالة الفشل
            return response()->json([
                'message' => $tr->translate('Failed to delete account'),
                'status' => 404], 404);
        }
    }

    public function user(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'data' => $user,
            'status' => 200], 200);
    }
}
