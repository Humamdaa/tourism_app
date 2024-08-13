<?php

namespace App\Http\Controllers\FlightRound;

use App\Http\Controllers\Controller;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class myFlightRoundBookedController extends Controller
{
    public function myFlightRound(Request $request)
    {
        $user = $request->user();

        $tr = new TranslateMessages();
        if ($user) {
            $flightsRound = $user->flightsRound()
                ->with(['toCity', 'fromCity', 'office'])
                ->get();

            return response()->json([
                'data' => $flightsRound,
                'status' => 200
            ],
                200
            );
        }
        return response()->json([
            'message' => $tr->translate('not found user'),
            'status' => 404
        ], 404);
    }
}
