<?php

namespace App\Services\hotels\InsideHotelPage;

use App\Models\hotels\Hotel;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class getHotelServices
{

    public function getServicesInHotel(Request $request)
    {
        $tr = new TranslateMessages();

        $temp = new findHotel();
        $hotel = $temp->Hotel($request);

        if ($hotel) {
            $services = $hotel->services()->get();
            if ($services) {
                return ['service' => $services];
            }
            return ['message' => "not found services for $hotel->name"];
        }
        return ['message' => $tr->translate('hotel not found')];
    }
}
