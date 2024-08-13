<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\hotels\BookRoomHotel;
use App\Models\hotels\Hotel;
use App\Services\translate\TranslateMessages;
use Carbon\Carbon;
use GPBMetadata\Google\Cloud\Networkmanagement\V1\Reachability;
use Illuminate\Http\Request;

class cancelBookHotelController extends Controller
{
    public function cancelBookRoom(Request $request)
    {
        $tr = new TranslateMessages();

        $room_id = $request->room_id;
        $hotel_id = $request->hotel_id;
        $start = $request->start;
        $end = $request->end;

        $user = $request->user();

        $hotel = Hotel::wher('id', $hotel_id)->first();

        if ($user) {
            $book = BookRoomHotel::where('id_room', $room_id)->where('id_hotel', $hotel_id)
                ->where('start', $start)->where('end', $end)->where('id_user', $user->id)->first();

            if ($book) {
                $bookStart = Carbon::parse($book->sart);
                $now = Carbon::now();

                $diffInDays = $now->diffInDays($bookStart, false);

                if ($bookStart > $now) {
                    if ($diffInDays > 1 && $bookStart > $now) {
                        $book->delete();
//                       return the money to user
                        $user->money += ($book->persons * $hotel->price);
                        return response()->json(['message' => $tr->translate('your booking has deleted')], 200);
                    }
                    return response()->json([
                        'message' => $tr->translate('you can not cancel your booking before 1 day')
                    ]);
                }
                return response()->json([
                    'message' => $tr->translate('you can not cancel your booking after starting it ')
                ]);
            }
            return response()->json(['message' => $tr->translate('not found the booking')], 404);
        }
        return response()->json(['message' => $tr->translate('not found the user')], 404);
    }
}
