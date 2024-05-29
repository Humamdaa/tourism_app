<?php

namespace App\Services\hotels\showHotels;

use App\Models\User;
use Illuminate\Http\Request;

class CheckIfHotelIsFavorite
{
    public function checkFavorite(User $user, $hotels)
    {

        //get hotels for user
        $favorites = $user->hotels()->get();
        //get favorite hotel for user
        $fav = $favorites->toArray();
        $favHotelIds = array_column($fav, 'id');
        $res = [];
        $count = 0;
        foreach ($hotels['hotels'] as $key => $hotel) {
            // Check if the hotel ID is in the favorite hotel IDs array
            $hotel['isFavorite'] = in_array($hotel['id'], $favHotelIds);
            // Add the hotel to the result array
            $res[$key] = $hotel;
        }
        return ['hotels'=>$res];

    }
}
