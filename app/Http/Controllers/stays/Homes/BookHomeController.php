<?php

namespace App\Http\Controllers\stays\Homes;

use App\Http\Controllers\Controller;
use App\Models\homes\BookHome;
use App\Services\homes\insideHomePage\findHome;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Validator;

class BookHomeController extends Controller
{
    public function bookHome(Request $request)
    {
        $tr = new TranslateMessages();

        $user = $request->user();
        $homeId = $request->home_id;

        $validator = Validator::make($request->all(), [
            'start' => 'required|date',
            'months' => 'required|integer|min:1',
        ]);

        $start = $request->start;
        $start = Carbon::createFromFormat('Y-m-d', $request->start);
        $months = $request->months;
        $end = $start->copy()->addDays(30 * $months);
        $temp = new findHome();
        $home = $temp->home($request);
        $total = $months * $home->monthly_rent;
        //check if his money is enough
        if (($total > $user->money)) {
            $message = "You do not have enough money,";
            $message .= "Your money is $user->money,";
            $message .= "Monthly rental price of the house is $home->monthly_rent ,";
            $message .= " The total price is $total.";
            return response()->json([
                'message' => $tr->translate($message)
            ]);
        }

        $existingBookings = BookHome::where('booking_status', 'accepted')
            ->where(function ($query) use ($start, $end) {
                $query->where(function ($subQuery) use ($start, $end) {
                    $subQuery->where('start', '<=', $start)
                        ->where('end', '>=', $start);
                })->orWhere(function ($subQuery) use ($start, $end) {
                    $subQuery->where('start', '<=', $end)
                        ->where('end', '>=', $end);
                });
            })
            ->where('home_id', $homeId)
            ->exists();

        if ($existingBookings) {
            // يوجد تداخل مع حجز مقبول
            return response()->json([
                'message' => 'هناك تداخل مع حجز مقبول في هذه الفترة.'
            ]);
        }

        // حفظ الحجز الجديد في قاعدة البيانات
        // ...

        if ($home) {
            $booking = bookHome::create([
                'booking_status' => "pending",
                'start' => $start,
                'end' => $end,
                'total' => $total,
                'home_id' => $homeId,
                'user_id' => $user->id
            ]);


            //reduce user money
            // $user->money -= ($person * $hotel->price);
            // $user->save();

            if ($booking) {
                return response()->json(['message' => $tr->translate('You have been successfully added to the list of pending reservations. The property owner is responsible for approving or rejecting your reservation, so contact him via his number if you encounter any problems or have some questions to discuss.
                The reservation value will be deducted, exclusively if the property owner agrees.')], 200);
            }
        }
        return response()->json(['message' => 'your booking is failed , try again later '], 422);
    }
}
