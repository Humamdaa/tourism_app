<?php

namespace App\Http\Controllers\Web\Hotel;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\hotels\Hotel;
use App\Services\translate\TranslateMessages;
use App\Services\WEB\Hotel_Recourses_helper\hotels_in_specific_city;
use App\Services\WEB\Hotel_Recourses_helper\store_hotel;
use App\Services\WEB\Hotel_Recourses_helper\update_hotel_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use phpseclib3\File\ASN1\Maps\RelativeDistinguishedName;
use Illuminate\Support\Facades\Session;


class HotelRecoursesController extends Controller
{
    public function show_hotels_in_specific_city(Request $request)
    {
        $show = new hotels_in_specific_city();
        return $show->show_hotels_in_specific_city($request);
    }

    public function search_city(Request $request)
    {
        $input = $request->input('input');
        $tr = new TranslateMessages();

        $validator = Validator::make(['input' => $input], [
            'input' => 'required|min:1', // Ensure that the input is not empty
        ]);

        if ($validator->fails()) {
//            return 'error';
            return redirect()->back()->with('result', $tr->translate($validator));
        }

        $cities = city::where('name', 'LIKE', "%$input%")->get();
        return redirect()->back()->with('result', $cities);

    }

    public function index()
    {
        $token = Session::get('token');
        $cities = city::all();

        return view('dashboard.hotels.cities')->with([
            'cities' => $cities,
            'token' => $token]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('dashboard.hotels.create_hotel')
            ->with(['city_name' => $request->input('city_name')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $st = new store_hotel();
        return $st->store_hotel($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $hotel = Hotel::where('id', $id)->first();
        if (!$hotel) {
            return redirect()->back()->with('success', 'hotel not found');
        }
        $city = $hotel->city()->get();

//        return $city;
//        return $city[0]['name'];

        $rooms = $hotel->rooms()->get();
        $services = $hotel->services()->get();

//        return $rooms ;
        return view('dashboard.hotels.Edit_hotel')->with([
            'hotel' => $hotel,
            'rooms' => $rooms,
            'services' => $services,
            'city_name' => $city[0]['name']
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = new update_hotel_details();
        return $update->update_details_hotel($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tr = new TranslateMessages();

        $hotel = Hotel::where('id', $id)->first();
        if ($hotel) {
            // Delete associated services
            $hotel->services()->delete();

            // Delete associated rooms
            $hotel->rooms()->delete();

            // Delete the hotel
            $hotel->delete();
            return redirect()->route('hotel.index')->with('message', $tr->translate('hotel deleted '));
        }
        return redirect()->back('error', $tr->translate('hotel note deleted'));
    }
}
