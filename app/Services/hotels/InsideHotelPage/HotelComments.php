<?php

namespace App\Services\hotels\InsideHotelPage;

use App\Models\hotels\Hotel;
use Illuminate\Http\Request;

class HotelComments
{
    public function getHotelComments(Request $request)
    {
        $temp = new findHotel();
        $hotel = $temp->Hotel($request);

        if ($hotel) {
            return response()->json(['comment' => $hotel->comments()->get()], 200);
        }
        return response()->json(['message'=>'hotel not found'],404);
    }
}
