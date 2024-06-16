<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UserLocation extends Controller
{
    public function index(Request $request)
    {
        // Use a known public IP for testing purposes
        $ip = $request->ip() === '127.0.0.1' ? '8.8.8.8' : $request->ip();

        $position = Location::get($ip);

        if ($position) {
            return response()->json([
                'ip' => $ip,
                'country' => $position->countryName,
                'region' => $position->regionName,
                'city' => $position->cityName,
                'latitude' => $position->latitude,
                'longitude' => $position->longitude,
            ]);
        } else {
            return response()->json(['message' => 'Unable to retrieve location'], 404);
        }
    }
}
