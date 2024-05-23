<?php

namespace App\Http\Controllers\currency;

use App\Http\Controllers\Controller;
use App\Services\hotels\removeHotelFromFavorite;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class setCurrency extends Controller
{
    public function setCurrency(Request $request)
    {
        $tr = new TranslateMessages();

        $file_path = public_path('currencies.json');

        $json_data = file_get_contents($file_path);

        $data = json_decode($json_data, true);

// Extract city names, codes, and values
        $codes = [];
// Accessing directly to $data['cur']['data']

        foreach ($data['cur']['data'] as $city => $details) {
            $codes[] = $details['code'];   // City code
        }
        foreach ($codes as $co) {
            if ($co == $request->cur) {
                session()->put('cur', $request->cur);
                return response()->json(['message' => $tr->translate("the currency becomes: $request->cur")]);
            }
        }
        return response()->json(['message' => $tr->translate('your currency is not found')]);
    }
}
