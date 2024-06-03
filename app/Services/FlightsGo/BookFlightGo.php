<?php

namespace App\Services\FlightsGo;

use App\Models\Flights\Classes;
use App\Models\Flights\FlightsGo\userFlightsGo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookFlightGo
{

    public function book(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'person' => 'required|min:1|max:8'

        ]);
        $user = $request->user();

        $user_id = $user->id;
        $class_id = Classes::where('name', $request->class)->value('id');
        $flightGo_id = $request->flight_go_id;
        $passenger = $request->person;

        userFlightsGo::create([
            'passenger'=>$passenger,
            'class_id'=>$class_id,
            'flightGo_id'=>$flightGo_id,
            'user_id'=>$user_id
        ]);
    }
}
