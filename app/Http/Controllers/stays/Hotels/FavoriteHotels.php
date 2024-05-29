<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class FavoriteHotels extends Controller
{
    public function getFavHotels(Request $request)
    {
        $tr = new TranslateMessages();
        $user = $request->user();
        $fav = $user->hotels()->get();
        if ($fav->isNotEmpty()) {

            return response()->json([
                'data' => $fav,
                'status' => 200
            ], 200);
        }
        return response()->json([
            'message' => $tr->translate('you do not have favorite hotels'),
            'status' => 404
        ], 404);
    }
}
