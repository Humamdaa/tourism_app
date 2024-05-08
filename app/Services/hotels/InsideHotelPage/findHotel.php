<?php

namespace App\Services\hotels\InsideHotelPage;

use App\Models\hotels\Hotel;
use Illuminate\Http\Request;

class findHotel
{
    public function Hotel(Request $request){
        $request->hotel_id= 1;

        return Hotel::find($request->hotel_id);
    }
}
