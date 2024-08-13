<?php

namespace App\Services\hotels;

use App\Models\favorite\FavoriteHotels;
use Illuminate\Http\Request;
use App\Services\translate\TranslateMessages;
use Illuminate\Support\Facades\Validator;

class changeFavorite
{
    public function change(Request $request)
    {
        $tr = new TranslateMessages();

        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 404
            ], 404); // You can use 422 if you prefer
        }

        $user = $request->user(); // Access authenticated user object (if middleware is applied)
        if (!$user) {
            return response()->json([
                'message' => $tr->translate('User is not authenticated'),
                'status' => 404
            ], 404);//401
        }

        $userId = $user->id; // Access authenticated user's ID

        $hotelId = $request->hotel_id; // Assuming you are getting the hotel ID from the request

        if ($userId && $hotelId) {
            // Check if the user already has this hotel in favorites to prevent duplication
            if (!FavoriteHotels::where('user_id', $userId)->where('hotel_id', $hotelId)->exists()) {

                echo 'here';
                $add = new addHotelToFavorite();
                return $add->addHotelToFavorite($hotelId, $userId);
            }
        }
        $remove = new removeHotelFromFavorite();
        return $remove->removeHotelFromeFavorite($user, $hotelId);
    }
}
