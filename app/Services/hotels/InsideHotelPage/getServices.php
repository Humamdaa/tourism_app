<?php

namespace App\Services\hotels\InsideHotelPage;

use App\Models\hotels\Hotel;
use Illuminate\Http\Request;

class getServices
{

    public function getServicesInHotel(Request $request)
    {

        $temp = new findHotel();
        $hotel = $temp->Hotel($request);

        if ($hotel) {
            $services = $hotel->services()->get();
            return response()->json(['service' => $services], 200);
        }
        return response()->json(['message' => 'hotel not found'], 404);
    }
}
