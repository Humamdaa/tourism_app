<?php

namespace App\Services\hotels;

use App\Models\favorite\FavoriteHotels;
use Illuminate\Http\Request;

class addHotelToFavorite
{
    public function addHotelToFavorite(Request $request)
    {
        $user = $request->user(); // Access authenticated user object (if middleware is applied)
        if (!$user) {
            return response()->json(['error' => 'User is not authenticated'], 401);
        }

        $userId = $user->id; // Access authenticated user's ID

        $hotelId = $request->hotel_id; // Assuming you are getting the hotel ID from the request

        if ($userId && $hotelId) {
            // Check if the user already has this hotel in favorites to prevent duplication
            if (!FavoriteHotels::where('user_id', $userId)->where('hotel_id', $hotelId)->exists()) {
                // Create a new favorite hotel record for the user
                FavoriteHotels::create([
                    'user_id' => $userId,
                    'hotel_id' => $hotelId,
                ]);

                return response()->json(['message' => 'Hotel added to favorites successfully'], 201);
            } else {
                return response()->json(['message' => 'Hotel is already in favorites'], 200);
            }
        } else {
            return response()->json(['error' => 'User ID or Hotel ID is missing'], 400);
        }
    }
}
