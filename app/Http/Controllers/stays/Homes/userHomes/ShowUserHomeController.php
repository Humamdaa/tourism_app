<?php

namespace App\Http\Controllers\stays\Homes\userHomes;

use App\Http\Controllers\Controller;
use App\Models\homes\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ShowUserHomeController extends Controller
{
    public function index(Request $request)
    {
        // الحصول على المستخدم الحالي
        $user = Auth::user();

        // جلب البيوت الخاصة بهذا المستخدم
        $verifiedHomes = Home::where('user_owner_id', $user->id)
            ->where('Verification_status', 'Verified')
            ->orderBy('created_at', 'desc') // ترتيب حسب الأحدث
            ->withCount('homeBookings') // جلب عدد الحجوزات لكل بيت
            ->get();

        $unverifiedHomes = Home::where('user_owner_id', $user->id)
            ->where('Verification_status', 'Unverified')
            ->orderBy('created_at', 'desc') // ترتيب حسب الأحدث
            ->withCount('homeBookings') // جلب عدد الحجوزات لكل بيت
            ->get();

        // إرجاع البيوت مقسمة إلى Verified و Unverified
        return response()->json([
            'verified_homes' => $verifiedHomes,
            'unverified_homes' => $unverifiedHomes
        ], 200);
    }
}
