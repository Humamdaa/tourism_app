<?php

namespace App\Services\WEB\Hotel_Recourses_helper;

use App\Models\city;
use Illuminate\Http\Request;
use App\Models\hotels\Hotel;
use App\Models\hotels\Room;
use App\Models\Service;
use App\Models\hotels\HotelServices;
use Illuminate\Support\Facades\DB;

class store_hotel
{

    public function store_hotel(Request $request)
    {


        $city = City::where('name', $request->input('city_name'))->first();
//        return $request;
        try {
            // Create and save the hotel
            $hotel = new Hotel();
            $hotel->name = $request->input('Hotel_name');
            $hotel->city_id = $city->id;
            $hotel->phone_hotel = $request->input('phone_hotel');
            $hotel->rate = $request->input('rate');
            $hotel->price = $request->input('price');
            $hotel->description = $request->input('description');
            $hotel->latitude = $request->input('latitude');
            $hotel->longitude = $request->input('longitude');
            $hotel->save();

            // Save rooms
            foreach ($request->input('rooms', []) as $roomData) {
                $room = new Room();
                $maxNumber = Room::max('number');

                $room->hotel_id = $hotel->id; // associate with hotel
                $room->person_num = $roomData['person_num'];
                $room->isBooking = 0;
                $room->number = $maxNumber + 1; // Increment the max number by 1
                $room->save();
            }

            // Save services
            foreach ($request->input('services', []) as $serviceName) {
//                // Check if service already exists
                $service = Service::firstOrCreate(['name' => $serviceName]);

//                // Create the hotel_service relationship
            $hotelService = new HotelServices();

            $hotelService->id_hotel =  $hotel->id;
            $hotelService->id_service = $service->id;
            $hotelService->save();
            }


            // Redirect or return a success message
            return redirect()->route('hotel.index')->with('message', 'Hotel created successfully!');

        } catch (\Exception $e) {
            // Rollback Transaction
            DB::rollback();

            // Redirect or return an error message
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());

        }
    }
}
