<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\hotels\BookRoomHotel;
use App\Models\hotels\Hotel;
use App\Services\hotels\InsideHotelPage\findHotel;
use App\Services\hotels\RemoveBookedRooms;
use Illuminate\Http\Request;

class BookHotelController extends Controller
{
    public function bookRoomInHotel(Request $request)
    {
        $user = $request->user();
        $hotelId = $request->hotel_id;
        $start = $request->start;
        $end = $request->end;
        $person = $request->persons;

        $temp = new findHotel();
        $hotel = $temp->Hotel($request);

        $availableRooms = $hotel->availableRoomsForPersons($person);

        //return $availableRooms;

        $roomsArray = $availableRooms->toArray();

        foreach ($roomsArray as $roomKey => &$room) {
            foreach ($room['bookings'] as $curBook) {
                if ($start >= $curBook['start'] && $start <= $curBook['end']) {
                    unset($roomsArray[$roomKey]);
                    break;
                } elseif ($end >= $curBook['start'] && $end <= $curBook['end']) {
                    unset($roomsArray[$roomKey]);
                    break;
                } elseif ($start <= $curBook['start'] && $end >= $curBook['end']) {
                    unset($roomsArray[$roomKey]);
                    break;
                }
            }
        }
        $roomsArray = array_values($roomsArray);

        //        return $roomsArray;

        if ($roomsArray) {
            $booked = BookRoomHotel::create([
                'start' => $start,
                'end' => $end,
                'persons' => $person,
                'id_room' => $roomsArray[0]['id'],
                'id_hotel' => $hotelId,
                'id_user' => $user->id
            ]);

            if ($booked) {
                return response()->json(['message' => 'your booking is added successfully'], 200);
            }
        }
        return response()->json(['message' => 'your booking is failed'], 422);
    }
}
