<?php

namespace App\Services\WEB\Hotel_Recourses_helper;


use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use App\Models\hotels\Hotel;
use App\Models\hotels\Room;
use App\Models\Service;
use App\Models\hotels\HotelServices;
use Illuminate\Support\Facades\DB;


class update_hotel_details
{

    public function update_details_hotel(Request $request,string $id)
    {
        $tr = new TranslateMessages();

        try {
            // Retrieve the hotel by its ID
            $hotel = Hotel::findOrFail($id);

            // Update hotel attributes
            $hotel->name = $request->input('Hotel_name');
            $hotel->phone_hotel = $request->input('phone_hotel');
            $hotel->rate = $request->input('rate');
            $hotel->price = $request->input('price');
            $hotel->description = $request->input('description');
            $hotel->latitude = $request->input('latitude');
            $hotel->longitude = $request->input('longitude');

            // Save the updated hotel
            $hotel->save();

            // Update rooms
            $roomNumbers = [];

            foreach ($request->input('rooms', []) as $index => $roomData) {
                if (isset($roomData['id'])) {
                    // Update existing room
                    $room = Room::findOrFail($roomData['id']);
                } else {
                    // Create new room
                    $room = new Room();
                    $room->hotel_id = $hotel->id;
                }

                $room->person_num = $roomData['person_num'];
                $room->isBooking = $room->isBooking ?? 0;
                $room->number = Room::max('number') + 1;

                $room->save();
                $roomNumbers[] = $room->id;
            }

            // Remove rooms that were not in the update request
            Room::where('hotel_id', $hotel->id)->whereNotIn('id', $roomNumbers)->delete();

            // Update services
            $serviceIds = [];
            foreach ($request->input('services', []) as $serviceName) {
                $service = Service::firstOrCreate(['name' => $serviceName]);

                // Create or update hotel_service relationship
                $hotelService = HotelServices::updateOrCreate(
                    ['id_hotel' => $hotel->id, 'id_service' => $service->id]
                );

                $serviceIds[] = $service->id;
            }

            // Remove services that were not in the update request
            HotelServices::where('id_hotel', $hotel->id)->whereNotIn('id_service', $serviceIds)->delete();

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route('hotel.index')->with('message', 'Hotel updated successfully!');

        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollback();

            // Redirect with error message
            return redirect()->back()->with('error', $tr->translate('Error occurred: ' . $e->getMessage()));
        }
    }
}
