<?php

namespace App\Services\hotels\InsideHotelPage;

use App\Models\hotels\BookRoomHotel;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CanWriteComment
{
    public function UserCanWriteComment(Request $request)
    {
        $tr = new TranslateMessages();

        $user = $request->user(); // Access authenticated user object (if middleware is applied)
        $user_id = $user->id ?? null; // Initialize to null if $user is null

        $hotel_id = $request->hotel_id;
//        return "user :".$user. "hotel:".$hotel_id;

        // Check if user and hotel IDs are set
        if ($user_id !== null && $hotel_id !== null) {
            $booking = BookRoomHotel::where('id_hotel', $hotel_id)->where('id_user', $user_id)->get();

            // Check if booking exists
            if ($booking) {
                foreach ($booking as $book) {
                    $end = $book->end;
                    if (Carbon::now()->gt($end)) {
                        return ['message' => $tr->translate('you can write comment')];
                    }
                }
                // Handle the case where the booking doesn't exist
                return ['message' => $tr->translate('you can not write comment')];
            }
        }
        // Handle the case where user or hotel ID is missing
        return ['message' => $tr->translate('User or hotel ID missing,or not found booking ,you can write comment')];

    }
}
