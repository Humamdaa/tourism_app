<?php

namespace App\Services\hotels\InsideHotelPage;

use App\Models\hotels\Hotel;
use Illuminate\Http\Request;

class getHotelServices
{

    public function getServicesInHotel(Request $request)
    {

        $temp = new findHotel();
        $hotel = $temp->Hotel($request);

        if ($hotel) {
            $services = $hotel->services()->get();
            if($services) {
                return ['service'=>$services];
            }
            return ['message'=>"not found services for $hotel->name"];
        }
        return ['message'=>'hotel not found'];
    }
}
