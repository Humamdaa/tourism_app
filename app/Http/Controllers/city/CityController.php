<?php

namespace App\Http\Controllers\city;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Services\Schedule\Booking_hotel\HotelBookingScheduling;
use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;

class CityController extends Controller
{
    public function getCities()
    {

//        $schedule = app(Schedule::class);
//        HotelBookingScheduling::updateRoomBookings();

        $cities = city::all();
        if($cities) {
            return response()->json(['city' => $cities], 200);
        }
        return response()->json(['message'=>'not found any city'],404);
    }

}
