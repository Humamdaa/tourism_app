<?php

namespace App\Http\Controllers\city;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Services\Schedule\Booking_hotel\HotelBookingScheduling;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;

class CityController extends Controller
{
    public function getCities()
    {

        $tr = new TranslateMessages();

        $cities = city::all();
        if ($cities) {
            return response()->json([
                    'city' => $cities,
                    'status' => 200
                ]
                , 200);
        }
        return response()->json([
            'message' => $tr->translate('not found any city'),
            'status' => 404
        ], 404);
    }

}
