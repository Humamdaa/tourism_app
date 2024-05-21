<?php

namespace App\Services\hotels;

use App\Models\favorite\FavoriteHotels;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class addHotelToFavorite
{
    public function addHotelToFavorite($hotel_id,$user_id)
    {
        $tr = new TranslateMessages();

        FavoriteHotels::create([
            'user_id' => $user_id,
            'hotel_id' => $hotel_id,
        ]);

        return response()->json([
                'message' => $tr->translate('Hotel added to favorites successfully'),
                'status' => 200
            ]
            , 200);
    }

}
