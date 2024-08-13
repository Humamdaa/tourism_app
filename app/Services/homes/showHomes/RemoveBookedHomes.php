<?php

namespace App\Services\homes\showHomes;

use App\Models\homes\BookHome;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RemoveBookedHomes
{
    public function fixBooking($homes, $start, $end)
    {
        foreach ($homes["homes"] as $homeKey => &$home) {
            foreach ($home["home_bookings"] as $curBook) {
                if ($curBook["booking_status"] == "accepted") {
                    if ($start >= $curBook['start'] && $start <= $curBook['end']) {
                        unset($homes["homes"][$homeKey]);
                    } elseif ($end >= $curBook['start'] && $end <= $curBook['end']) {
                        unset($homes["homes"][$homeKey]);
                    } elseif ($start <= $curBook['start'] && $end >= $curBook['end']) {
                        unset($homes["homes"][$homeKey]);
                    }
                }
            }
        }

        if (empty($homes)) {
            // If rooms array is empty, unset the hotel
            unset($homes);
        }
        return $homes;
    }
}
