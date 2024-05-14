<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\hotels\BookRoomHotel;
use GPBMetadata\Google\Cloud\Networkmanagement\V1\Reachability;
use Illuminate\Http\Request;

class cancelBookHotelController extends Controller
{
    public function cancelBookRoom(Request $request)
    {
        $room_id = $request->room_id;
        $hotel_id = $request->hotel_id;
        $start = $request->start;
        $end = $request->end;
        $user = $request->user();
        if ($user) {
            $book = BookRoomHotel::where('id_room', $room_id)->where('id_hotel', $hotel_id)
                ->where('start', $start)->where('end', $end)->where('id_user', $user->id)->first();
            if ($book) {
                $book->delete();
                return response()->json(['message' => 'your booking has deleted'], 200);
            }
            return response()->json(['message' => 'not found the booking'], 404);
        }
        return response()->json(['message' => 'not found the user'], 404);

    }
}
