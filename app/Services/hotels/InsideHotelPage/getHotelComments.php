<?php

namespace App\Services\hotels\InsideHotelPage;

use App\Models\hotels\Hotel;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class getHotelComments
{
    public function getCommentsInHotel(Request $request)
    {
        $tr = new TranslateMessages();

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
        return ['message'=>$tr->translate("not found comment for $hotel->name")];
        }
        return ['message'=>$tr->translate('hotel not found')];
    }
}
