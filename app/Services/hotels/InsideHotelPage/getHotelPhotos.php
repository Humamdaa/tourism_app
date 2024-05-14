<?php

namespace App\Services\hotels\InsideHotelPage;


use App\Models\hotels\Hotel;
use Illuminate\Http\Request;

class getHotelPhotos
{
    public function getPhotosInHotel(Request $request){
        $temp = new findHotel();
        $hotel = $temp->Hotel($request);

        if($hotel){
            return ['photo'=>$hotel->photos()->get()];
        }

        return ['message'=>'not found hotel'];
    }
}
