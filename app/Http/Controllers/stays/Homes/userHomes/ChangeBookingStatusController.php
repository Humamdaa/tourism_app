<?php

namespace App\Http\Controllers\stays\Homes\userHomes;

use App\Http\Controllers\Controller;
use App\Models\homes\BookHome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChangeBookingStatusController extends Controller
{
    public function changeStatus(Request $request)
    {
        // التحقق من أن الـ booking_id و booking_status موجودة في الطلب
        $request->validate([
            'booking_id' => 'required|integer|exists:book_home_user_pivot,id',
            'booking_status' => 'required|in:accepted,rejected'
        ]);

        // جلب الحجز بناءً على الـ booking_id
        $booking = BookHome::find($request->booking_id);

        // التحقق من أن حالة الحجز الحالية هي pending
        if ($booking->booking_status != 'pending') {
            return response()->json([
                'message' => 'Booking status can only be changed if it is pending.',
                'status' => 400
            ], 400);
        }

        // بدء معاملة لضمان التكامل في حالة تحويل الأموال
        DB::beginTransaction();

        try {
            if ($request->booking_status == 'accepted') {
                // جلب المستخدم صاحب الحجز
                $user = User::find($booking->user_id);

                // التحقق من وجود الرصيد الكافي لدى المستخدم
                if ($user->money < $booking->total) {
                    return response()->json([
                        'message' => 'Insufficient money.',
                        'status' => 400
                    ], 400);
                }

                // اقتطاع المبلغ من المستخدم صاحب الحجز
                $user->money -= $booking->total;
                $user->save();

                // حساب المبلغ المضاف لصاحب البيت مع خصم 2%
                $amountToOwner = $booking->total * 0.98;

                // جلب صاحب البيت عن طريق الـ home_id
                $home = $booking->home;
                $owner = $home->owner; // نفترض أن علاقة owner موجودة

                // إضافة الرصيد لصاحب البيت
                $owner->money += $amountToOwner;
                $owner->save();
            }

            // تغيير حالة الحجز إلى الحالة الجديدة (accepted أو rejected)
            $booking->booking_status = $request->booking_status;
            $booking->save();
            // تأكيد المعاملة
            DB::commit();
            return response()->json([
                'message' => 'Booking status updated successfully.',
                'status' => 200
            ], 200);

        } catch (\Exception $e) {
            // في حالة حدوث خطأ، يتم التراجع عن المعاملة
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to update booking status.',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // وظيفة لتحديث الحجوزات المتأخرة
    public function updatePendingBookings()
    {
        // الحصول على الحجوزات التي حالتها pending ووقت بدايتها أقل من الوقت الحالي
        $currentTime = Carbon::now();
        $bookings = BookHome::where('booking_status', 'pending')
            ->where('start', '<=', $currentTime)
            ->get();

        DB::beginTransaction();

        try {
            foreach ($bookings as $booking) {
                // تغيير حالة الحجز إلى rejected
                $booking->booking_status = 'rejected';
                $booking->save();
            }

            DB::commit();

            return response()->json([
                'message' => 'Bookings updated to rejected successfully.',
                'status' => 200
            ], 200);

        } catch (\Exception $e) {
            // في حالة حدوث خطأ، يتم التراجع عن المعاملة
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to update bookings.',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}
