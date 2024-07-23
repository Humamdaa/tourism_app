<?php

namespace App\Services\Flight\FlightRound;

use App\Models\Flights\FlightsRound\classFlightRound;
use App\Models\Flights\FlightsRound\userFlightRound;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class BookFlightRound
{
    public function bookRound(Request $request)
    {
        $tr = new TranslateMessages();
        //take user
        $user = $request->user();


        if ($user) {
            $user_id = $user->id;
            $class_id = $request->class_id;
            $flightRound_id = $request->flightRound_id;
            $classFlightTaken = classFlightRound::where('class_id', $class_id)
                ->where('flightRound_id',$flightRound_id)->first();
            $passenger = $request->person;
        } else {
            return response()->json([
                'message' => $tr->translate('not found user')
            ]);
        }


        //check if user has enough money
        if ($passenger * $classFlightTaken->price > $user->money) {
            $total = $passenger * $classFlightTaken->price;
            return response()->json([
                'message' => $tr->translate("you do not have enough money, you money is $user->money
                and the cost is $total"),
                'status' => 404
            ], 404);
        }

        //check if the number of passenger is less than of capacity in flight from this class
        if ($passenger > $classFlightTaken->capacity) {
            return response()->json([
                'message' => $tr->translate("your passenger number is bigger than from capacity "),
                'status'=>404
            ],404);
        }

        userFlightRound::create([
            'passenger' => $passenger,
            'class_id' => $class_id,
            'flightRound_id' => $flightRound_id,
            'user_id' => $user_id,
//            'seat_number' => 'NULL'
        ]);

        $user->money -= $passenger * $classFlightTaken->price;
        $user->save();

        $classFlightTaken->capacity -= $passenger;
        $classFlightTaken->save();

        return response()->json([
            'message' => $tr->translate('the booking is done successfully'),
            'status' => 200
        ], 200);

    }
}
