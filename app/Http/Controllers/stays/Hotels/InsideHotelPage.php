<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\hotels\Hotel;
use App\Services\hotels\InsideHotelPage\getServices;
use App\Services\hotels\InsideHotelPage\HotelComments;
use Illuminate\Http\Request;

class InsideHotelPage extends Controller
{
    public function servicesInHotel(Request $request)
    {
        $services = new getServices();
        return $services->getServicesInHotel($request);
    }

    public function commentsInHotel(Request $request)
    {
        $com = new HotelComments();
        return $com->getHotelComments($request);
    }

    public function photos()
    {

    }

    public function insideHotel(Request $request)
    {
// Call the servicesInHotel function
        $servicesResult = $this->servicesInHotel($request);

        // Call the commentsInHotel function
        $commentsResult = $this->commentsInHotel($request);

        // Return both results
        return [
            $servicesResult,
            $commentsResult
        ];
    }
}
