<?php

namespace App\Services\hotels\InsideHotelPage;


use App\Models\hotels\Hotel;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class getHotelPhotos
{
    public function getPhotosInHotel(Request $request){
        $tr = new TranslateMessages();

        $temp = new findHotel();
        $hotel = $temp->Hotel($request);

        if($hotel){
            return ['photo'=>$hotel->photos()->get()];
        }

        return ['message'=>$tr->translate('not found hotel')];
    }
}
