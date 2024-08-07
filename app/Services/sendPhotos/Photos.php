<?php

namespace App\Services\sendPhotos;

use Illuminate\Support\Facades\File;

class Photos
{
    public function AllPhoto($hotel)
    {
        $cityName = $hotel->city->name;

        //get photos like string
        $photosString = $hotel->photos()->get();

        //open folder !
        $directoryPath = public_path("hotels/$cityName");

        // Check if the directory exists
        if (!File::exists($directoryPath)) {
            return response()->json(['message' => 'City directory not found.'], 404);
        }
        $urls = [];
        foreach ($photosString as $ps)

//            $urls[] = url("hotels/$cityName/$ps->img"); //this line add 127.0.0.1
            //this just from hotels folder/cityName/photo
            $urls[] = "hotels/$cityName/$ps->img";

        return $urls;
    }
}
