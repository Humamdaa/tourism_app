<?php

namespace App\Services\FlightsGo;

use App\Models\Flights\Classes;
use App\Models\Flights\FlightsGo\userFlightsGo;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookFlightGo
{

    public function book(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'person' => 'required|integer|min:1|max:8',
            'class_id' => 'required|integer|exists:classes,id',
            'flightGo_id' => 'required|integer|exists:flightsgo,id'
        ]);

        $tr = new TranslateMessages();

        if ($validator->fails()) {
            return response()->json([
                'message' => $tr->translate($validator->messages()),
                'status' => 404
            ], 404);
        }
        //take user
        $user = $request->user();

        if ($user) {
            $user_id = $user->id;
            $class_id = Classes::where('name', $request->class)->value('id');
            $flightGo_id = $request->flight_go_id;
            $passenger = $request->person;
        } else {
            return response()->json(['message' => $tr->translate('not found user')]);
        }

        userFlightsGo::create([
            'passenger' => $passenger,
            'class_id' => $class_id,
            'flightGo_id' => $flightGo_id,
            'user_id' => $user_id
        ]);

        return response()->json([
            'message' => $tr->translate('the booking is done'),
            'status' => 200
        ], 200);

    }
}
