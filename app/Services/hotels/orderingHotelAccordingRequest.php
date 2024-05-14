<?php

namespace App\Services\hotels;

use App\Models\hotels\Hotel;
use Illuminate\Http\Request;

class orderingHotelAccordingRequest
{
    public function normal(Request $request)
    {
        $hotels = Hotel::query()
            ->byCityName($request->cityName)
            ->byPersonNum($request->persons)
            ->get();
        return $hotels;
    }

    public function Price(Request $request)
    {
        $hotels = Hotel::query()
            ->byCityName($request->cityName)
            ->byPersonNum($request->persons)
            ->orderBy('price', 'asc')
            ->get();
        return $hotels;

    }

    public function rate(Request $request)
    {
        $hotels = Hotel::query()
            ->byCityName($request->cityName)
            ->byPersonNum($request->persons)
            ->orderBy('rate', 'decs')
            ->get();
        return $hotels;

    }

    public function populare(Request $request)
    {
        $hotels = Hotel::query()
            ->byCityName($request->cityName)
            ->byPersonNum($request->persons)
            ->withCount(['rooms' => function ($query) {
                $query->whereHas('bookings');
            }])
            ->orderBy('rooms_count', 'desc')
            ->get();

        return $hotels;
    }
}
