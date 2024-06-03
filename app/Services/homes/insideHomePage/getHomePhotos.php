<?php

namespace App\Services\homes\insideHomePage;

use App\Services\homes\insideHomePage\findHome;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class getHomePhotos
{
    public function getPhotosInHome(Request $request){
        $tr = new TranslateMessages();

        $temp = new findHome();
        $home = $temp->home($request);

        if($home){
            return $home->photos()->get();
        }

        return ['message'=>$tr->translate('not found home')];
    }
}
