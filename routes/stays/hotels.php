<?php

use App\Http\Controllers\stays\Hotels\Add_RemoveHotelFavorite;
use App\Http\Controllers\stays\Hotels\addCommentController;
use App\Http\Controllers\stays\Hotels\BookHotelController;
use App\Http\Controllers\stays\Hotels\cancelBookHotelController;
use App\Http\Controllers\stays\Hotels\FavoriteHotels;
use App\Http\Controllers\stays\Hotels\HotelController;
use App\Http\Controllers\stays\Hotels\InsideHotelPage;
use App\Http\Controllers\stays\Hotels\ModifyBookController;
use App\Http\Controllers\stays\Hotels\MyHotelBookController;
use App\Models\hotels\Hotel;
use App\Services\hotels\InsideHotelPage\findHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('hotels',[HotelController::class,'getHotels'])->middleware('auth:api');

Route::get('addRemoveHotelToFav',[Add_RemoveHotelFavorite::class,'changeFav'])->middleware('auth:api');
Route::get('FavoriteHotels',[FavoriteHotels::class,'getFavHotels'])->middleware('auth:api');

Route::get('InsideHotelPage',[InsideHotelPage::class,'insideHotel'])->middleware('auth:api');//,'session'

Route::post('writeComment',[addCommentController::class,'comment']);//->middleware('auth:api');

Route::post('book',[BookHotelController::class,'bookRoomInHotel'])->middleware('auth:api');

Route::delete('cancelBook',[cancelBookHotelController::class,'cancelBookRoom'])->middleware('auth:api');

Route::post('modifyBooking',[ModifyBookController::class,'modifyBooking'])->middleware('auth:api');

Route::get('myHotelBooking',[MyHotelBookController::class,'getMyHotelBooking'])->middleware('auth:api');


//test real time
//
Route::get('test_real', function () {
    $request = new Request();
    $request->merge(['hotel_id' => 1]);

    $hotelService = new findHotel();
    $hotel = $hotelService->Hotel($request);

    // Retrieve the related comments
    $comments = $hotel->comments()->get();

    // Pass the comments to the view as 'com'
    return view('real-time.real-time')->with('com', $comments);
});
