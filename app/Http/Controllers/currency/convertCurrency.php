<?php

namespace App\Http\Controllers\currency;

use App\Http\Controllers\Controller;
use App\Services\translate\TranslateMessages;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class convertCurrency extends Controller
{
    public function convert($price)//
    {

        $tr = new TranslateMessages();
// Path to the JSON file in the public folder
        $file_path = public_path('currencies.json');

// Read the JSON file
        $json_data = file_get_contents($file_path);
// Decode the JSON data
        $data = json_decode($json_data, true);

        foreach ($data['cur']['data'] as $city => $details) {
            $codeToValue[$details['code']] = $details['value'];
        }

//        return $codeToValue["BNB"];

        if (!session()->has('cur')) {
            // If 'lang' key doesn't exist, set it to 'en'
            session(['cur' => 'USD']);
            return $price;
        }

        return $codeToValue[session('cur')] * $price;
    }
}
