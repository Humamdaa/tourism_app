<?php

namespace App\Http\Controllers\FlightGo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class myFlightGoBookedController extends Controller
{
    public function myFlightGo(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $userFlightGo = $user->flightsGo()
                ->with(['office', 'fromCity', 'toCity','stops'])
                ->get();
            if($userFlightGo) {
                return response()->json([
                    'data' => $userFlightGo,
                    'status' => 200], 200);
            }
            return response()->json([
                'message'=>'not found flightBooked'
            ]);
        }
        return response()->json([
            'message' => 'not found user',
            'status' => 404
        ], 404);
    }
}
