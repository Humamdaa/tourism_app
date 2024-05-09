<?php

use App\Http\Controllers\stays\Hotels\HotelController;
use App\Http\Controllers\stays\Hotels\InsideHotelPage;
use Illuminate\Support\Facades\Route;


Route::get('hotels',[HotelController::class,'getHotelsByCityName']);

Route::get('addHotelToFav',[HotelController::class,'addHotelToFav'])->middleware('auth:api');
Route::get('removeHotelFromFav',[HotelController::class,'removeHotelToFav'])->middleware('auth:api');

Route::get('InsideHotelPage',[InsideHotelPage::class,'insideHotel']);//->middleware('auth:api');
