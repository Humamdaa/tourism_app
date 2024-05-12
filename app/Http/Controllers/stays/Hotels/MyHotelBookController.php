<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;

class MyHotelBookController extends Controller
{
    public function getMyHotelBooking(Request $request)
    {
        $user = $request->user();

//        return $user;

        if ($user) {
            $all = $user->bookings()->with('room:id,person_num')->with('hotel:id,name,price')->get();

            if ($all) {
                return response()->json(['data' => $all], 200);
            }
            return response()->json(['message' => 'there are no hotel booking for you'], 404);
        }
        return response()->json(['message' => 'the user not found'], 404);
    }
}
