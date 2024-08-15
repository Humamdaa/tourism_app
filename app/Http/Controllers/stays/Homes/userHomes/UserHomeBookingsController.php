<?php

namespace App\Http\Controllers\stays\Homes\userHomes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\homes\Home;
use Illuminate\Support\Facades\Auth;

class UserHomeBookingsController extends Controller
{
    public function show(Request $request)
    {
        // التحقق من أن الـ home_id موجود في الطلب
        $request->validate([
            'home_id' => 'required|integer|exists:homes,id',
            'sort' => 'sometimes|in:pending,accepted,all'
        ]);

        // الحصول على المستخدم الحالي
        $user = Auth::user();

        // جلب البيت المحدد
        $home = Home::where('id', $request->home_id)
            ->where('user_owner_id', $user->id) // التأكد من أن المستخدم يملك هذا البيت
            ->first();

        // التحقق من وجود البيت
        if (!$home) {
            return response()->json([
                'message' => 'Home not found or you do not have access to this home.',
                'status' => 404
            ], 404);
        }

        // جلب الحجوزات المرتبطة بالبيت مع فلترة حسب الحالة المطلوبة
        $bookingsQuery = $home->homebookings(); // افترض أن العلاقة هي homebookings

        if ($request->has('sort') && $request->sort != 'all') {
            $bookingsQuery->where('booking_status', $request->sort);
        }

        $bookings = $bookingsQuery->orderBy('created_at', 'desc')->get();

        // إرجاع معلومات البيت والحجوزات بشكل منفصل
        return response()->json([
            'home' => $home,
            'bookings' => $bookings,
            'status' => 200
        ], 200);
    }
}
