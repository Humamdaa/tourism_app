<?php

namespace App\Http\Controllers\FlightRound;

use App\Http\Controllers\Controller;
use App\Services\Flight\FlightRound\BookFlightRound;
use App\Services\Flight\FlightsGo\BookFlightGo;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookFlightRoundController extends Controller
{
    public function book(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'person' => 'required|integer|min:1|max:8',
            'class_id' => 'required|integer|exists:classes,id',
            'flightRound_id' => 'required|integer|exists:flightsgo,id'
        ]);

        $tr = new TranslateMessages();

        if ($validator->fails()) {
            return response()->json([
                'message' => $tr->translate($validator->messages()),
                'status' => 404
            ], 404);
        }

        $book = new BookFlightRound();
        return $book->bookRound($request);
    }
}
