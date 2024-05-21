<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\hotels\Hotel;
use App\Services\hotels\orderingHotelAccordingRequest;
use App\Services\hotels\showHotels\RemoveBookedRooms;
use App\Services\hotels\showHotels\changePriceOfHotel;
use App\Services\translate\TranslateMessages;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{

    public function getHotels(Request $request)
    {
        $tr = new TranslateMessages();

        $validator = Validator::make($request->all(), [
            'cityName' => 'required|string|max:20',
            'persons' => 'required|integer|min:1|max:8',
            'start' => 'required|date|after_or_equal:today',
            'end' => 'required|date|after:start',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 404
            ], 404); // You can use 422 if you prefer
        }
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

        $hotelsArray['hotels'] = $hotels->toArray();
//        return $hotelsArray;

        //fix booking
        $remove = new RemoveBookedRooms();
        $result = $remove->fixBooking($hotelsArray, $request['start'], $request['end']);

        $var = new changePriceOfHotel();

        if (!empty($result) && isset($result['hotels']) && !empty($result['hotels'])) {
            $last = $var->changePrice($result['hotels']);
            return response()->json([
                'data' => $last,
                'status' => 200], 200);
        }

        return response()->json([
            'message' => $tr->translate("There are no available hotels in {$request['cityName']} enough for {$request['persons']} persons from {$request['start']} to {$request['end']}."),
            'status' => 404
        ], 404);

    }

}
