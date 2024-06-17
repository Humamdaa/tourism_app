<?php

namespace App\Http\Controllers\FlightGo;

use App\Http\Controllers\Controller;
use App\Services\Flight\FlightsGo\BookFlightGo;
use Illuminate\Http\Request;
use App\Services\translate\TranslateMessages;
use Illuminate\Support\Facades\Validator;

class BookFlightGoController extends Controller
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

        $book = new BookFlightGo();
        return $book->book($request);
    }
}
