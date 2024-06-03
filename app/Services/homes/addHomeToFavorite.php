<?php

namespace App\Services\homes\showHomes;

use App\Models\favorite\FavoriteHomes;
use App\Services\translate\TranslateMessages;

class addHomeToFavorite
{
    public function addHomeToFavorite($home_id,$user_id)
    {
        $tr = new TranslateMessages();

        FavoriteHomes::create([
            'user_id' => $user_id,
            'home_id' => $home_id,
        ]);

        return response()->json([
                'message' => $tr->translate('Home added to favorites successfully'),
                'status' => 200
            ]
            , 200);
    }

}
