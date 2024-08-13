<?php

namespace App\Services\Flight\FlightsGo;

use App\Models\Flights\Classes;
use App\Models\Flights\FlightsGo\classFlightGo;
use App\Models\Flights\FlightsGo\userFlightsGo;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class BookFlightGo
{

    public function book(Request $request)
    {
        $tr = new TranslateMessages();
        //take user
        $user = $request->user();


        if ($user) {
            $user_id = $user->id;
            $class_id = $request->class_id;
            $flightGo_id = $request->flightGo_id;
            $classTaken = classFlightGo::where('class_id', $class_id)
                ->where('flightGo_id',$flightGo_id)->first();
            $passenger = $request->person;
        } else {
            return response()->json([
                'message' => $tr->translate('not found user')
            ]);
        }

        //check if user has enough money
        if ($passenger * $classTaken->price > $user->money) {
            $total = $passenger * $classTaken->price;
            return response()->json([
                'message' => $tr->translate("you do not have enough money, you money is $user->money
                and the cost is $total"),
                'status' => 404
            ], 404);
        }

        //check if the number of passenger is less than of capacity in flight from this class
        if ($passenger > $classTaken->capacity) {
            return response()->json([
                'message' => $tr->translate("your passenger number is bigger than from capacity "),
                'status'=>404
            ],404);
        }

        userFlightsGo::create([
            'passenger' => $passenger,
            'class_id' => $class_id,
            'flightGo_id' => $flightGo_id,
            'user_id' => $user_id,
//            'seat_number' => 'NULL'
        ]);

        $user->money -= $passenger * $classTaken->price;
        $user->save();

        $classTaken->capacity -= $passenger;
        $classTaken->save();

        return response()->json([
            'message' => $tr->translate('the booking is done successfully'),
            'status' => 200
        ], 200);

    }
}
