<?php

use App\Http\Controllers\stays\Homes\HomeController;
use App\Http\Controllers\stays\Homes\MyHomeBookController;
use Illuminate\Support\Facades\Route;

Route::get('hotels',[HomeController::class,'getHomesByCityName']);
Route::get('homes/myHotelBooking', [MyHomeBookController::class, 'getMyHomeBooking'])->middleware('auth:api');


?>
