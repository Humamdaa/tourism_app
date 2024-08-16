<?php

use App\Http\Controllers\UserLocation;
use App\Http\Controllers\Web\City\CityController;
use App\Http\Controllers\Web\Hotel\HotelRecoursesController;
use App\Http\Controllers\Web\login\loginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('login', function () {
    return view('dashboard/login/login');
});

Route::post('login', [loginController::class,'login'])->name('login');


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
]);//->middleware('role');

Route::get('/hotels/city',[HotelRecoursesController::class,'show_hotels_in_specific_city'])->name('city.hotels');

Route::get('hotel/search-city', [HotelRecoursesController::class, 'search_city'])
    ->name('hotel.search_city')
    ;//->middleware('role');

Route::resource('hotel', HotelRecoursesController::class)
    ->names([
        'index'=>'hotel.index'
    ]);
    //->middleware('role');

