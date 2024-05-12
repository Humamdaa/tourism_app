<?php

namespace App\Services\Schedule\Booking_hotel;

use App\Models\hotels\Room;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;

class HotelBookingScheduling
{public static function updateRoomBookings()
{
    $rooms = Room::all();
    foreach ($rooms as $room) {
        $temp = $room->toArray();
        if ($temp['isBooking'] === 1) {
            $count = 0;
            $bookings = $room->bookings()->get();
            $bookingsCurrentRoom = $bookings->toArray();

            foreach ($bookingsCurrentRoom as $b) {
                if ($b['end'] < now()) {
                    $count++;
                }
            }
            if ($count === count($bookingsCurrentRoom)) {
                // All bookings for this room have ended

                DB::table('rooms')
                    ->update(['isBooking' => 0]);

                $room->save(); // Save the changes
            }
        }
    }
}

}
