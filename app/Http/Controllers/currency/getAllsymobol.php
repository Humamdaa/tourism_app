<?php

namespace App\Http\Controllers\currency;

use App\Http\Controllers\Controller;
use App\Services\translate\TranslateMessages;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class getAllsymobol extends Controller
{

    public function getSymbols()
    {

// Path to the JSON file in the public folder
        $file_path = public_path('currencies.json');

// Read the JSON file
        $json_data = file_get_contents($file_path);
// Decode the JSON data
        $data = json_decode($json_data, true);

        $symbolToCity = [];
        foreach ($data['cur']['data'] as $city => $details) {
            $symbolToCity[$details['code']] = $city;
        }

        return $symbolToCity;

    }
}
