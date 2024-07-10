<?php

namespace App\Services\Flight\FlightRound;

use App\Models\Flights\FlightsGo\FlightGo;
use App\Models\Flights\FlightsRound\FlightRound;
use Illuminate\Http\Request;

class getFlightRound
{
    public function flightRound(Request $request){

        $query = FlightRound::query()
            ->WithinDateRangeAndCities($request->dateGo, $request->dateBack,$request->from_city, $request->to_city);
//            ->with(['office', 'classes', 'services', 'stops','fromCity','toCity']);


return $query->get();
    }
}
