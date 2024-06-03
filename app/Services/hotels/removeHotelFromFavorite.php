<?php

namespace App\Services\hotels;

use App\Models\User;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class removeHotelFromFavorite
{
    public function removeHotelFromeFavorite(User $user,$hotelId)
    {
        $tr = new TranslateMessages();

                $user->hotels()->detach($hotelId);
                return response()->json(['message' => $tr->translate('Hotel removed from favorites successfully'),
                    'status'=>200
                ], 200);


    }

}
