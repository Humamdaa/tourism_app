<?php

namespace App\Services\sendPhotos;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class mainPhotos
{

    //this function to take the main photos for hotels

    //$Ids : id the item/s  , $cityName ,
    // $all : is boolean value to know If I must send all or just one
    public function listPhotos($cityName, $Ids, $all)
    {
        $directoryPath = public_path("hotels/$cityName");

        // Check if the directory exists
        if (!File::exists($directoryPath)) {
            return response()->json(['message' => 'City directory not found.'], 404);
        }

        //get first photo to show it if $all is 0 :
        // Get all files in the city directory
        $files = File::files($directoryPath);

        //I must get the first photo to each hotel
        $firstPhoto = [];
        $i = 0;
        foreach ($Ids as $id) {
            $firstPhoto[$i++] = strtolower($cityName) . "$id.jpg";
        }

        $urls = [];

        foreach ($firstPhoto as $fP)
            $urls[] = url("hotels/$cityName/$fP");

        return $urls;
    }
}