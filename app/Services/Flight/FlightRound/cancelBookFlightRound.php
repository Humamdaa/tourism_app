<?php

namespace App\Services\Flight\FlightRound;

use App\Models\Flights\FlightsRound\classFlightRound;
use App\Models\Flights\FlightsRound\FlightRound;
use App\Models\Flights\FlightsRound\userFlightRound;
use App\Services\translate\TranslateMessages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpseclib3\Math\BigInteger;

class cancelBookFlightRound
{
    public function cancelBook(Request $request)
    {
        $user = $request->user();
        $tr = new TranslateMessages();

        $book = userFlightRound::where('id', $request->id)->first();


        $classFlight = classFlightRound::where('class_id', $book->class_id)
            ->where('flightRound_id', $book->flightRound_id)->first();

        $flight = FlightRound::where('id', $book->flightRound_id)->first();

        $num_passenger = $book->passenger;

        //return money
        //before 3 days return all the cost,
        // exactly 3 return and take 10/100 from the all cost
        // less than 3 days take 70/100 from all cost
        if ($book && $flight) {

            //take the date of going of flight
            $flightDate = Carbon::parse($flight->dateGo);
            $now = Carbon::now();
            if ($flightDate > $now) {
                $diffInDays = $now->diffInDays($flightDate, false);

                if ($book->delete()) {
                    //return money to user
                    if ($diffInDays > 3) {
                        $user->money += $classFlight->price * $num_passenger;
                    } // Check if the flight is more than 3 days away from now
                    elseif ($diffInDays === 3) {
                        $user->money += ($classFlight->price * $num_passenger) - ($classFlight * $num_passenger * 10 / 100);
                    } elseif ($diffInDays === 2) {
                        $user->money += ($classFlight->price * $num_passenger) - ($classFlight * $num_passenger * 70 / 100);
                    }

                    $user->save();
                    //add the passenger after user deletes his flight
                    $classFlight->capacity += $num_passenger;
                    $classFlight->save();
                    return response()->json([
                        'message' => $tr->translate('your flight is canceled successfully'),
                        'status' => 200
                    ], 200);
                }
            }
            return response()->json([
                'message' => $tr->translate('you can not cancel or update your booking after end of flight date'),
                'status' => 404
            ]);

        }
        return response()->json([
            'message' => $tr->translate('not found the flight or your flight with these specifications'),
            'status' => 404], 404);
    }
}
