<?php

namespace App\Services\Flights;

use App\Models\Flights\FlightsGo\FlightGo;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class getFlightsGo
{

    public function flightsGo(Request $request)
    {
        //normal with all flights go without any sorting
        //distinct method to ensure unique results.
        $query = FlightGo::query()
            ->WithinDateRangeAndCities($request->date, $request->from_city, $request->to_city)
            ->with(['office', 'classes', 'services', 'stops'])
            ->distinct();

        //get flights for specific class
        if ($request->filled('class')) {
            $query->withClass($request->class, $request->persons);
        }

        if ($request->filled('sortPrice')) {
            $query->withClassPrice($request->sortPrice);
        }

        if ($request->filled('NumStop')) {
            $query->WithNumStops($request->NumStop);
        }

        // Query the database for flights within this date range
        // Use the defined scope to query the flights

        $flights = $query->get();
        return $flights;
    }
}
