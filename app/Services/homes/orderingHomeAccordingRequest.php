<?php

namespace App\Services\homes;

use App\Models\hotels\Hotel;
use App\Models\Homes\Home;
use Illuminate\Http\Request;

class orderingHomeAccordingRequest
{
    public function normal(Request $request)
    {
        $homes = Home::query()
            ->byCityName($request->cityName)
            ->bySpace($request->minSpace,$request->maxSpace)
           ->byRoomsNum($request->rooms)
            ->get();
        return $homes;
    }

    public function Price(Request $request)
    {
        $homes = Home::query()
            ->byCityName($request->cityName)
            ->bySpace($request->minSpace,$request->maxSpace)
           ->byRoomsNum($request->rooms)
           ->orderBy('monthly_rent', 'asc')
           ->get();
        return $homes;

    }
    public function populare(Request $request)
    {
        $homes = Home::query()
            ->byCityName($request->cityName)
            ->bySpace($request->minSpace,$request->maxSpace)
           ->byRoomsNum($request->rooms)
           ->withCount("homeBookings")
           ->orderBy('home_bookings_count', 'desc')
           ->get();
        return $homes;

    }

}
