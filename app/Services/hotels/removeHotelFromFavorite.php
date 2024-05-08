<?php

namespace App\Services\hotels;

use Illuminate\Http\Request;

class removeHotelFromFavorite
{
    public function addHotelToFavorite(Request $request){
        $user = $request->user(); // Access authenticated user object (if middleware is applied)
        // Access user ID (if user object is available)
        $userId = $user ? $user->name : null; // Handle case if user is not authenticated
        // Add logic to add the hotel to favorites for the user (userId)


        $hotelId = $request->hotel_id; // Assuming you are getting the hotel ID from the request

        if ($userId && $hotelId) {
            // Check if the user already has this hotel in favorites to prevent duplication
            if ($user->hotels()->where('hotel_id', $hotelId)->exists()) {
                // Detach the hotel from the user's favorites
                $user->hotels()->detach($hotelId);
                return response()->json(['message' => 'Hotel removed from favorites successfully'], 200);
            } else {
                return response()->json(['message' => 'Hotel is not in favorites'], 404);
            }
        } else {
            return response()->json(['error' => 'User ID or Hotel ID is missing'], 400);
        }
    }

}
