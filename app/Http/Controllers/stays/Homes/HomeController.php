<?php

namespace App\Http\Controllers\stays\Homes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\homes\showHomes\changePriceOfHome;
use App\Services\homes\orderingHomeAccordingRequest;
use App\Services\homes\showHomes\RemoveBookedHomes;
use App\Services\sendPhotos\mainPhotos;
use App\Services\sendPhotos\mergeUrlMainPhoto;
use App\Services\translate\TranslateMessages;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    public function getHomesByCityName(Request $request)
    {

        $tr = new TranslateMessages();

        $validator = Validator::make($request->all(), [
            'cityName' => 'required|string|max:20',
            'minSpace' => 'required|integer|min:1|max:999',
            'maxSpace' => 'required|integer|min:1|max:999',
            'rooms' => 'required|integer|min:1|max:20',
            'start' => 'required|date',
            'months' => 'required|integer|min:1',
        ]);

        $start = Carbon::createFromFormat('Y-m-d', $request->start);
        $months = $request->months;
        $end = $start->copy()->addDays(30 * $months);

        // Handle validation failures
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 404
            ], 404); // You can use 422 if you prefer
        }
        $temp = new orderingHomeAccordingRequest();
        switch ($request->sort) {
            case 'price':
                $homes = $temp->Price($request);
                break;
            case 'popular':
                $homes = $temp->populare($request);
                break;
            case 'pe':
                $hotels = $temp->Price($request);
                break;
            default:
                $homes = $temp->normal($request);
                break;
        }

        $homesArray['homes'] = $homes->toArray();
        //        return $homesArray;

        //fix booking
        $remove = new RemoveBookedHomes();
        $result = $remove->fixBooking($homesArray, $request['start'], $end);

        $homeIds = [];
        foreach ($result['homes'] as $home) {
            $homeIds[] = $home['id'];
        }

        $var = new changePriceOfHome();

        $photos = new mainPhotos();
        $phs = $photos->listPhotos($request->cityName, $homeIds, 0,"homes");

        if (!empty($result) && isset($result['homes']) && !empty($result['homes'])) {
            //chengePriceCurrency
            $last = $var->changePrice($result);
            //merge photo for each hotel
            $mer = new mergeUrlMainPhoto();
            $last = $mer->merge($last['homes'], $phs);
            return response()->json(["data" => $last, "status" => 200], 200);
        }


        return response()->json([
            'message' => $tr->translate("There are no available hotels in {$request['cityName']} enough for {$request['persons']} persons from {$request['start']} to {$request['end']}."),
            'status' => 404
        ], 404);
    }
}
