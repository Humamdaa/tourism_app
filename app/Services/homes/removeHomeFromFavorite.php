<?php

namespace App\Services\homes;

use App\Models\User;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class removeHomeFromFavorite
{
    public function removeHomeFromFavorite(User $user,$homeId)
    {
        $tr = new TranslateMessages();

                $user->favHomes()->detach($homeId);
                return response()->json(['message' => $tr->translate('home removed from favorites successfully'),
                    'status'=>200
                ], 200);


    }

}
