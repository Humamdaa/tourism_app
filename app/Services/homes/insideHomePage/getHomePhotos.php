<?php

namespace App\Services\homes\insideHomePage;

use App\Services\homes\insideHomePage\findHome;
use App\Services\sendPhotos\Photos;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class getHomePhotos
{
    public function getPhotosInHome(Request $request){
        $tr = new TranslateMessages();

        $temp = new findHome();
        $home = $temp->home($request);

        if ($home) {
            $allPhotos = new Photos();
            $urls = $allPhotos->AllPhoto($home,"homes");
            return ['photos' => $urls];
        }

        return ['message'=>$tr->translate('not found home')];
    }
}
