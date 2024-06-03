<?php

namespace App\Services\hotels\InsideHotelPage;


use App\Models\hotels\Hotel;
use App\Services\sendPhotos\mainPhotos;
use App\Services\sendPhotos\Photos;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class getHotelPhotos
{
    public function getPhotosInHotel(Request $request)
    {
        $tr = new TranslateMessages();

        $temp = new findHotel();
        $hotel = $temp->Hotel($request);


        if ($hotel) {
            $allPhotos = new Photos();
            $urls = $allPhotos->AllPhoto($hotel);
            return ['photos' => $urls];
        }

        return ['message' => $tr->translate('not found hotel')];
    }
}
