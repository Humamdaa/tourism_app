<?php

namespace App\Http\Controllers\stays\Homes;

use App\Http\Controllers\Controller;
use App\Services\homes\changeHomeFavorite;
use Illuminate\Http\Request;

class Add_RemoveHomeFavoriteController extends Controller
{
    public function changeFav(Request $request)
    {
        $change = new changeHomeFavorite();
        return $change->change($request);
    }
}
