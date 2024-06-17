<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\hotels\BookRoomHotel;
use App\Models\hotels\Hotel;
use App\Services\hotels\InsideHotelPage\findHotel;

//use App\Services\hotels\RemoveBookedRooms;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookHotelController extends Controller
{
    public function bookRoomInHotel(Request $request)
    {
        //////////////////////////////////////////////////////////////////////////////////////////
        /// check price and take room that contains less capacity : done
        /// ///////////////////////////////////////////////////////////////////////////////////

        $tr = new TranslateMessages();

        $user = $request->user();
        $hotelId = $request->hotel_id;
        $start = $request->start;
        $end = $request->end;
        $person = $request->persons;

        $temp = new findHotel();
        $hotel = $temp->Hotel($request);

        $startDate = Carbon::parse($start);
        $endDate = Carbon::parse($end);

        // Calculate the difference in days
        $daysDifference = $startDate->diffInDays($endDate);
        //check if his money is enough
        $total = $hotel->price * $person * $daysDifference;
        if ($total > $user->money) {
            $total = $person * $hotel->price * $daysDifference;
            $message = "You do not have enough money,";
            $message .= "Your money is $user->money,";
            $message .= "The price of a room in the hotel is $hotel->price for per adult,";
            $message .= "The total price is $total.";

            return response()->json([
                'message' => $tr->translate($message)
            ]);
        }

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
        // Convert array to collection
        $roomsCollection = collect($roomsArray);

        // Sort the collection by 'person_num' in ascending order
        $sortedRoomsCollection = $roomsCollection->sortBy('person_num');

        // Re-index the collection numerically
        $sortedRoomsCollection = $sortedRoomsCollection->values();

        // Convert back to array
        $sortedRoomsArray = $sortedRoomsCollection->toArray();
//        return $sortedRoomsArray;
//        return $roomsArray;

        //        return $roomsArray;

        if ($roomsArray) {
            $booked = BookRoomHotel::create([
                'start' => $start,
                'end' => $end,
                'persons' => $person,
                'id_room' => $sortedRoomsArray[0]['id'],
                'total'=> $total,
                'id_room' => $roomsArray[0]['id'],
                'id_hotel' => $hotelId,
                'id_user' => $user->id
            ]);

            //reduce user money
            $user->money -= ($person * $hotel->price * $daysDifference);
            $user->save();

            if ($booked) {
                return response()->json([
                    'message' => $tr->translate('your booking is added successfully'),
                    'status' => 200
                ], 200);
            }
        }
        return response()->json([
            'message' => 'your booking is failed',
            'money' => $user->money
        ], 422);

        return response()->json(['message' => 'your booking is failed'], 422);
    }
}
