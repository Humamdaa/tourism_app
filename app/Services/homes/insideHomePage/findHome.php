<?php

namespace App\Services\homes\insideHomePage;

use App\Models\homes\Home;
use Illuminate\Http\Request;

class findHome
{
    public function home(Request $request)
    {
//        $request->hotel_id= 1;
        $home = Home::find($request->home_id);
        return $home;
    }
}
