<?php

namespace App\Http\Controllers\FlightGo;

use App\Http\Controllers\Controller;
use App\Services\Flight\FlightsGo\getFlightsGo;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class flightsGo extends Controller
{
    public function Flights(Request $request)
    {
        ///////////////////////////////////////////////////////////
        /// add more options to filter
        /// done : price , price, number stops
        /// /////////////////////////////////////////////////
        $tr = new TranslateMessages();

        // Define custom error messages
        $messages = [
            'class.in' => 'The selected class is invalid. Please choose from First class, Business, or Economy.',
        ];

        $validator = Validator::make($request->all(), [
            'from_city' => 'required|string|max:20',
            'to_city' => 'required|string|max:20',
            'persons' => 'required|integer|min:1|max:8',
            'date' => 'required|date|after_or_equal:today',
//            for filtering
            'class' => 'string|nullable|in:First class,Business,Economy',
            'sortPrice' => 'in:asc,desc|nullable',
            'NumStop' => 'nullable|integer|min:0|max:3',
            'period' => 'in:early,late'
        ], $messages);
        // Handle validation failures
        if ($validator->fails()) {
            return response()->json([
                'message' => $tr->translate($validator->errors()->first()),
                'status' => 404
            ], 404); // You can use 422 if you prefer
        }


        $fl = new getFlightsGo();
        $flights = $fl->flightsGo($request);


        if ($flights->isNotEmpty() && $flights != '[]') {
//            return $flights;
            return response()->json([
                'data' => $flights,
                'count' => count($flights),
                'status' => 200
            ], 200);
        }
        return response()->json([
            'message' => $tr->translate('not found flights'),
            'status' => 404
        ], 404);


    }
}
