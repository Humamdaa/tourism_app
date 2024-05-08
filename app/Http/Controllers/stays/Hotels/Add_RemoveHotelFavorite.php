<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Services\hotels\addHotelToFavorite;
use App\Services\hotels\removeHotelFromFavorite;
use Illuminate\Http\Request;

class Add_RemoveHotelFavorite extends Controller
{
    public function addHotelToFav(Request $request)
    {

        $add = new addHotelToFavorite();
        return $add->addHotelToFavorite($request);

    }
    public function removeHotelToFav(Request $request){
        $remove = new removeHotelFromFavorite();
        return $remove->addHotelToFavorite($request);
    }
}
