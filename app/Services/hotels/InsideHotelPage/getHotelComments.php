<?php

namespace App\Services\hotels\InsideHotelPage;

use App\Models\hotels\Hotel;
use Illuminate\Http\Request;

class getHotelComments
{
    public function getCommentsInHotel(Request $request)
    {
        $temp = new findHotel();
        $hotel = $temp->Hotel($request);

        if ($hotel) {
            $hotelId = $hotel->id;
//            $comments = $hotel->comments()->with('user:id,name')->get();
            $comments = $hotel->comments()->with(['user:id,name', 'user.bookings' => function ($query) use ($hotelId) {
                $query->where('id_hotel', $hotelId)->orderBy('end','asc');
            }])->get();

            if($comments){
            return ['comment'=>$comments];
        }
        return ['message'=>"not found comment for $hotel->name"];
        }
        return ['message'=>'hotel not found'];
    }
}
