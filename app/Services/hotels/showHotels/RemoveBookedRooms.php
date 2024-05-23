<?php

namespace App\Services\hotels\showHotels;

class RemoveBookedRooms
{
    public function fixBooking($hots, $start, $end)
    {
        foreach ($hots['hotels'] as $hotelKey => &$hotel) {
            foreach ($hotel['rooms'] as $roomKey => $room) {
                foreach ($room['bookings'] as $curBook) {
                    if ($start >= $curBook['start'] && $start <= $curBook['end']) {
                        unset($hotel['rooms'][$roomKey]);
                    } elseif ($end >= $curBook['start'] && $end <= $curBook['end']) {
                        unset($hotel['rooms'][$roomKey]);
                    } elseif ($start <= $curBook['start'] && $end >= $curBook['end']) {
                        unset($hotel['rooms'][$roomKey]);
                    }
                }
            }
            // Check if the rooms array of the hotel is empty
            if (empty($hotel['rooms'])) {
                // If rooms array is empty, unset the hotel
                unset($hots['hotels'][$hotelKey]);
            }
        }


//            $hotels = array_map(function ($hots) {
//                // Remove 'rooms' and 'bookings' keys from each hotel entry
//                unset($hots['rooms']);
//                unset($hots['bookings']);
//                return $hots;
//            }, $hots['hotels']);

        return $hots;

    }

}
