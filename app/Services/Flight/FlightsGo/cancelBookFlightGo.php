<?php

namespace App\Services\Flight\FlightsGo;

use App\Models\Flights\FlightsGo\classFlightGo;
use App\Models\Flights\FlightsGo\FlightGo;
use App\Models\Flights\FlightsGo\userFlightsGo;
use App\Services\translate\TranslateMessages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class cancelBookFlightGo
{
    public function cancelBook(Request $request)
    {
        $user = $request->user();
        $tr = new TranslateMessages();

        $book = userFlightsGo::where('class_id', $request->class_id)
            ->where('flightGo_id', $request->flightGo_id)->first();

        $classFlight = classFlightGo::where('class_id', $request->class_id)
            ->where('flightGo_id', $request->flightGo_id)->first();

        $flight = FlightGo::where('id', $request->flightGo_id)->first();
        //return money
        //before 3 days return all the cost,
        // exactly 3 return and take 10/100 from the all cost
        // less than 3 days take 70/100 from all cost

        if ($flight) {
            $flightDate = Carbon::parse($flight->date);
            $now = Carbon::now();
            if ($flightDate > $now) {
                $diffInDays = $now->diffInDays($flightDate, false);

                if ($diffInDays > 3) {
                    $user->money += $classFlight->price;
                } // Check if the flight is more than 3 days away from now
                elseif ($diffInDays === 3) {
                    $user->money += $classFlight->price - ($classFlight * 10 / 100);
                } elseif ($diffInDays === 2) {
                    $user->money += $classFlight->price - ($classFlight * 70 / 100);
                }

                $user->save();


                if ($book->delete()) {
                    $classFlight->capacity += $book->pssenger;
                    return response()->json([
                        'message' => $tr->translate('your flight is canceled successfully'),
                        'status' => 404
                    ], 404);
                }
            }
            return response()->json([
                'message' => $tr->translate('you can not cancel or update your booking after end of flight date'),
                'status'=>404
            ]);

        }
        return response()->json(['message' => $tr->translate('not found the flight')]);
    }
}
