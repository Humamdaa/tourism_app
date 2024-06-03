<?php

namespace App\Http\Controllers\stays\Homes;

use App\Http\Controllers\Controller;
use App\Services\homes\insideHomePage\getHomeFeatures;
use App\Services\homes\insideHomePage\getHomePhotos;
use App\Services\homes\insideHomePage\getOwnerHomeData;
use Illuminate\Http\Request;


class InsideHomePageController extends Controller
{

    public function feturesInHome(Request $request)
    {
        $features = new getHomeFeatures();
        return $features->getFeaturesInHome($request);
    }


    public function photosInHome(Request $request)
    {
        $temp = new getHomePhotos();
        return $temp->getPhotosInHome($request);
    }

    public function ownerHome(Request $request)
    {
        $temp = new getOwnerHomeData();
        return $temp->getHomeOwner($request);

    }


    public function insideHome(Request $request)
    {


        // Call the feturesInHome function
        $feturesResult = $this->feturesInHome($request);
        $photosResult = $this->photosInHome($request);
        $homeOwnerResult = $this->ownerHome($request);

        return response()->json([
            'data' => [
                // "ownerName"=>
                "features"=>$feturesResult,
                "photos"=>$photosResult,
                "homeOwnerData"=>$homeOwnerResult
            ],
            'status' => 200
            //'session' => Session::get('lang')
        ], 200);
    }
}
