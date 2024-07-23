<?php

namespace App\Services\Flight\FlightRound;

use App\Models\Flights\Classes;
use App\Models\Flights\FlightsGo\FlightGo;
use App\Models\Flights\FlightsRound\FlightRound;
use App\Services\Flight\insertCityInFlight;
use Illuminate\Http\Request;

class getFlightRound
{
    public function flightRound(Request $request)
    {

        $query = FlightRound::query()
            ->WithinDateRangeAndCities($request->dateGo, $request->dateBack, $request->from_city, $request->to_city)
            ->with(['office', 'classes', 'services', 'stops', 'fromCity', 'toCity']);

        $classId = 0;
        if ($request->filled('class')) {
            $query->withClass($request->class, $request->persons);
            $class = Classes::where('name',$request->class)->first();
            $classId = $class->id;
        }

        if($request->filled('min_val') && $request->filled('max_val')){
            $query->PriceRange($request->min_val, $request->max_val, $classId);
        }
        $flights_round = $query->get();

        //keep the from and to city just in the first record
        $temp = new insertCityInFlight();
        $flights_round = $temp->putInFirstFlight($flights_round);
        return $flights_round;
    }
}
