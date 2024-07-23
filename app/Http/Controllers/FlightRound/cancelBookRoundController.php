<?php

namespace App\Http\Controllers\FlightRound;

use App\Http\Controllers\Controller;
use App\Services\Flight\FlightRound\cancelBookFlightRound;
use App\Services\Flight\FlightsGo\cancelBookFlightGo;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class cancelBookRoundController extends Controller
{
    public function cancelFlightRound(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:user_flights_round,id|min:1'
        ]);

        $tr = new TranslateMessages();

        if($validator->fails()){
            return response([
                'message'=>$tr->translate($validator->messages())
            ]);
        }


        $cancel = new cancelBookFlightRound();
        return $cancel->cancelBook($request);
    }
}
