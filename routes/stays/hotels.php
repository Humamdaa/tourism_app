<?php

use App\Http\Controllers\stays\Hotels\Add_RemoveHotelFavorite;
use App\Http\Controllers\stays\Hotels\addCommentController;
use App\Http\Controllers\stays\Hotels\BookHotelController;
use App\Http\Controllers\stays\Hotels\cancelBookHotelController;
use App\Http\Controllers\stays\Hotels\HotelController;
use App\Http\Controllers\stays\Hotels\InsideHotelPage;
use App\Http\Controllers\stays\Hotels\MyHotelBookController;
use Illuminate\Support\Facades\Route;


Route::get('hotels',[HotelController::class,'getHotelsByCityName']);

Route::get('addHotelToFav',[Add_RemoveHotelFavorite::class,'addHotelToFav'])->middleware('auth:api');
Route::get('removeHotelFromFav',[Add_RemoveHotelFavorite::class,'removeHotelFromFav'])->middleware('auth:api');

Route::get('InsideHotelPage',[InsideHotelPage::class,'insideHotel'])->middleware('auth:api');

Route::post('writeComment',[addCommentController::class,'comment'])->middleware('auth:api');

Route::post('book',[BookHotelController::class,'bookRoomInHotel'])->middleware('auth:api');

//complete
Route::delete('cancelBook',[cancelBookHotelController::class,'cancelBookRoom'])->middleware('auth:api');

Route::get('myHotelBooking',[MyHotelBookController::class,'getMyHotelBooking'])->middleware('auth:api');
