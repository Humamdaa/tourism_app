<?php

namespace App\Services\hotels;

use App\Models\hotels\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->orderBy('rate', 'desc')//asc, desc
            ->get();
        return $hotels;

    }

    public function popular(Request $request)
    {
        $hotels = Hotel::query()
            ->byCityName($request->cityName)
            ->byPersonNum($request->persons)
            ->withCount(['rooms as bookings_count' => function ($query) {
                $query->select(DB::raw('count(book_room_hotel.id)'))
                    ->join('book_room_hotel', 'rooms.id', '=', 'book_room_hotel.id_room');
            }])
            ->orderBy('bookings_count', 'desc')//asc, desc
            ->get();


        return $hotels;
    }
}
