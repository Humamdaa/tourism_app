<?php

namespace App\Services\sendPhotos;

class mergeUrlMainPhoto
{
    //take array and the urls
    public function merge($hotels, $phs)
    {
        $mergedData = [];
        foreach ($hotels as $index => $hotel) {
            // Check if the index exists in the $phs array
            if (isset($phs[$index])) {
                // Add the 'photoUrl' directly to the hotel array
                $hotel['photoUrl'] = $phs[$index];
            }
            // Add the hotel to the merged data array
            $mergedData[] = $hotel;
        }
        return $mergedData;
    }


}
