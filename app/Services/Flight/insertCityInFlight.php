<?php

namespace App\Services\Flight;

class insertCityInFlight
{
    //send from and to city just in the first flight
    public function putInFirstFlight($flights)
    {

// Ensure that fromCity and toCity are only in the first flight
        $firstFlight = $flights->first();

        $flights->skip(1)->each(function ($flight) {
            unset($flight->fromCity);
            unset($flight->toCity);
        });
        return $flights;
    }
}
