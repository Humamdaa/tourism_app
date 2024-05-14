<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\hotels\Hotel;
use App\Services\hotels\orderingHotelAccordingRequest;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Services\hotels\RemoveBookedRooms;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{

    public function getHotelsByCityName(Request $request)
    {
//        return $request;

//        $request = request()->merge([
//            'cityName' => 'NewYork',
//            'persons' => 1,
//            'start' => '2028-08-14',
//            'end' => '2028-09-14',
//            'children'=>true
//        ]);

        $temp = new orderingHotelAccordingRequest();

        switch ($request->sort) {
            case 'price':
                $hotels = $temp->Price($request);
                break;
            case 'rate':
                $hotels = $temp->rate($request);
                break;
            case 'popular':
                $hotels = $temp->populare($request);
                break;
            default:
                $hotels = $temp->normal($request);
                break;
        }
//                return $hotels;

        $hotelsArray['hotels'] = $hotels->toArray();
//        return $hotelsArray;

        $remove = new RemoveBookedRooms();
        $result = $remove->fixBooking($hotelsArray, $request['start'], $request['end']);

        if (count($result) !== 0 && !empty($result)) {
            return response()->json(['data' => $result], 200);
        }
        return response()->json([
            'message' => "There are no available hotels in {$request['cityName']} enough for {$request['persons']} persons from {$request['start']} to {$request['end']}."
        ]);

    }

}
