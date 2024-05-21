<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\hotels\BookRoomHotel;
use App\Models\hotels\Hotel;
use App\Services\hotels\InsideHotelPage\CanWriteComment;
use App\Services\hotels\InsideHotelPage\getHotelPhotos;
use App\Services\hotels\InsideHotelPage\getHotelServices;
use App\Services\hotels\InsideHotelPage\getHotelComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InsideHotelPage extends Controller
{
    public function servicesInHotel(Request $request)
    {
        $services = new getHotelServices();
        return $services->getServicesInHotel($request);
    }

    public function commentsInHotel(Request $request)
    {
        $com = new getHotelComments();
        return $com->getCommentsInHotel($request);
    }

    public function photosInHotel(Request $request)
    {
        $temp = new getHotelPhotos();
        return $temp->getPhotosInHotel($request);
    }

    public function WriteComment(Request $request)
    {
        $can = new CanWriteComment();
        return $can->UserCanWriteComment($request);
    }

    public function insideHotel(Request $request)
    {

        $comment = $this->WriteComment($request);

// Call the servicesInHotel function
        $servicesResult = $this->servicesInHotel($request);

        // Call the commentsInHotel function
        $commentsResult = $this->commentsInHotel($request);

        $photosResult = $this->photosInHotel($request);

        return response()->json([
            'data' => [
                $servicesResult,
                $commentsResult,
                $photosResult,
                $comment,
            ],
            'status'=>200
            //'session' => Session::get('lang')
        ], 200);
    }
}
