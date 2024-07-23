<?php

namespace App\Http\Controllers\FlightRound;

use App\Http\Controllers\Controller;
use App\Services\Flight\FlightRound\getFlightRound;
use App\Services\Flight\FlightsGo\getFlightsGo;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class flightRoundController extends Controller
{
    public function FlightRound(Request $request)
    {
        ///////////////////////////////////
        /// dateBack after dateGo
        ///////////////////////////////
        $tr = new TranslateMessages();

//        $request->merge([
//            'from_city' => 'Damascus',
//            'to_city' => 'NewYork',
//            'persons' => 1,
//            'dateGo' => '2025-11-11',
//            'dateBack' => '2025-11-16',
////            'class'=>'First class',
//            'min_val'=>80,
//            'max_val'=>170
//        ]);

        $validator = Validator::make($request->all(), [
            'from_city' => 'required|string|max:20',
            'to_city' => 'required|string|max:20',
            'persons' => 'required|integer|min:1|max:8',
            'dateGo' => 'required|date|after_or_equal:today',
            'dateBack' => 'required|date|after_or_equal:dateGo',
            //for filtering
            //  range, asc, desc,  and must use group by to compilation of classes of the same name
            'class' => 'string|nullable|in:First class,Business,Economy',
            'min_val' => 'required|numeric|min:0',
            'max_val' => 'required|numeric|gte:min_val',
//            'sortPrice' => 'in:asc,desc|nullable',
//            'NumStop' => 'nullable|integer|min:0',
//            'period'=>'in:early,late'
        ]);
        // Handle validation failures
        if ($validator->fails()) {
            return response()->json([
                'message' => $tr->translate($validator->errors()->first()),
                'status' => 404
            ], 404); // You can use 422 if you prefer
        }


        $fl = new getFlightRound();
        return $fl->flightRound($request);
    }
}
