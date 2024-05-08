<?php

namespace App\Services\hotels;

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
                    }
                }
            }
            // Check if the rooms array of the hotel is empty
            if (empty($hotel['rooms'])) {
                // If rooms array is empty, unset the hotel
                unset($hots['hotels'][$hotelKey]);
            }
        }
        return $hots;

    }

}
