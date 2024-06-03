<?php

namespace App\Http\Controllers\stays\Homes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Translate\translateController;
use Illuminate\Http\Request;

class FavoriteHomesController extends Controller
{
    public function getFavHomes(Request $request)
    {
        $tr = new translateController();
        $user = $request->user();
        $fav = $user->favHomes()->get();
        if ($fav->isNotEmpty()) {

            return response()->json([
                'data' => $fav,
                'status' => 200
            ], 200);
        }
        return response()->json([
            'message' => $tr ->translate("you do not have favorite homes") ,
            'status' => 404
        ], 404);
    }
}
