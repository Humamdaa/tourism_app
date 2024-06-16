<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\hotels\BookRoomHotel;
use App\Models\hotels\Hotel;
use App\Services\translate\TranslateMessages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ModifyBookController extends Controller
{
    public function modifyBooking(Request $request)
    {
        $tr = new TranslateMessages();
        $user = $request->user();
        $bookingId = $request->booking_id;

        // Find the existing booking
        $booking = BookRoomHotel::find($bookingId);
        if (!$booking || $booking->id_user != $user->id) {
            return response()->json([
                'message' => $tr->translate('Booking not found or unauthorized'),
                'status' => 404
            ],
                404);
        }

        // Delete the existing booking
        $tempBooking = $booking;
        if ($booking->delete()) {
            // Restore user money
            $hotel = Hotel::find($tempBooking->id_hotel);
            $startDate = Carbon::parse($tempBooking->start);
            $endDate = Carbon::parse($tempBooking->end);

            // Calculate the difference in days
            $daysDifference = $startDate->diffInDays($endDate);
            $user->money += ($tempBooking->persons * $hotel->price * $daysDifference);
            $user->save();

            // Create a new booking
            $newBook = new BookHotelController();
            return $newBook->bookRoomInHotel($request);

        }

        return response()->json([
            'message' => $tr->translate('Failed to modify the existing booking'),
            'status' => 404], 404);
    }
}
