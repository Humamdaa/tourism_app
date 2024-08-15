<?php

use App\Http\Controllers\UserLocation;
use App\Http\Controllers\Web\City\CityController;
use App\Http\Controllers\Web\Hotel\HotelRecoursesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('flight', function () {
    return view('dashboard/index');
})->name('flight');

//Route::get('nav_bar',function (){
//    return view('dashboard/nav_bar/nav');
//})->name('nav_bar');
//
//Route::get('cont',function (){
//    return view('dashboard/container/container');
//});

Route::resource('city', CityController::class)->names([
    'index' => 'city.index',
]);



Route::resource('hotel', HotelRecoursesController::class);

Route::get('hotel/search-city', [HotelRecoursesController::class, 'search_city'])->name('hotel.search_city');
