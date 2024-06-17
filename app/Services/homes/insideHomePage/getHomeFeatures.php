<?php

namespace App\Services\homes\insideHomePage;
use App\Services\homes\insideHomePage\findHome;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class getHomeFeatures
{

    public function getFeaturesInHome(Request $request)
    {
        $tr = new TranslateMessages();

        $temp = new findHome();
        $home = $temp->home($request);
        if ($home) {
            $features = $home->features()->get();
            if ($features->isNotEmpty()) {
                // Use the pluck method to retrieve a collection of feature names
                $featureNames = $features->pluck('name');
                return $featureNames;
            }
            return ['message' => $tr->translate("not found features for this home")];
        }
        return ['message' => $tr->translate('home not found')];
    }
}
