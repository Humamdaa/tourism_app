<?php

namespace App\Services\homes\showHomes;

use App\Models\User;
use Illuminate\Http\Request;

class CheckIfHomesFavorite
{
    public function checkFavorite(User $user, $homes)
    {

        //get hotels for user
        $favorites = $user->favHomes()->get();
        //get favorite hotel for user
        $fav = $favorites->toArray();
        $favHomeIds = array_column($fav, 'id');
        $res = [];
        $count = 0;
        foreach ($homes['homes'] as $key => $home) {
            // Check if the hotel ID is in the favorite hotel IDs array
            $home['isFavorite'] = in_array($home['id'], $favHomeIds);
            // Add the hotel to the result array
            $res[$key] = $home;
        }
        return ['homes' => $res];
    }
}
