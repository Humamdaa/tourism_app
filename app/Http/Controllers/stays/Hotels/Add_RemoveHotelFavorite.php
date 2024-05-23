<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Services\hotels\addHotelToFavorite;
use App\Services\hotels\changeFavorite;
use App\Services\hotels\removeHotelFromFavorite;
use Illuminate\Http\Request;

class Add_RemoveHotelFavorite extends Controller
{

    public function changeFav(Request $request)
    {
        $change = new changeFavorite();
        return $change->change($request);
    }
}
