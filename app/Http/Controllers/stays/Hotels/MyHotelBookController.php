<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Services\hotels\showHotels\changePriceOfHotel;
use App\Services\translate\TranslateMessages;
use http\Env\Response;
use Illuminate\Http\Request;

class MyHotelBookController extends Controller
{
    public function getMyHotelBooking(Request $request)
    {
        $tr = new TranslateMessages();

        //take user
        $user = $request->user();
        $change = new changePriceOfHotel();
//        return $user;

        if ($user) {
            $all = $user->bookings()->with('room:id,person_num')->with('hotel:id,name,price')->get();

            if ($all->isNotEmpty()) {
                // Convert prices before returning the booking data
                $all = $all->toArray();
                $converted = $change->changePriceInBooking($all);

                return response()->json(['data' => $converted], 200);
            }
            return response()->json(['message' => $tr->translate('there are no hotel booking for you')], 404);
        }
        return response()->json(['message' => $tr->translate('the user not found')], 404);
    }
}
