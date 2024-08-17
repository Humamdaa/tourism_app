<?php

use App\Http\Controllers\stays\Homes\userHomes\AddHomeController;
use App\Http\Controllers\stays\Homes\HomeController;
use App\Http\Controllers\stays\Homes\MyHomeBookController;
use App\Http\Controllers\stays\Homes\Add_RemoveHomeFavoriteController;
use App\Http\Controllers\stays\Homes\BookHomeController;
use App\Http\Controllers\stays\Homes\FavoriteHomesController;
use App\Http\Controllers\stays\Homes\InsideHomePageController;
use App\Http\Controllers\stays\Homes\userHomes\ChangeBookingStatusController;
use App\Http\Controllers\stays\Homes\userHomes\ShowUserHomeController;
use App\Http\Controllers\stays\Homes\userHomes\UserHomeBookingsController;
use Illuminate\Support\Facades\Route;

Route::get('homes',[HomeController::class,'getHomesByCityName'])->middleware('auth:api');
Route::get('homes/myHomeBookings', [MyHomeBookController::class, 'getMyHomeBooking'])->middleware('auth:api');
Route::get('addRemoveHomeToFav',[Add_RemoveHomeFavoriteController::class,'changeFav'])->middleware('auth:api');
Route::get('favoriteHomes',[FavoriteHomesController::class,'getFavHomes'])->middleware('auth:api');
Route::get('InsideHomePage',[InsideHomePageController::class,'insideHome'])->middleware('auth:api');//,'session'
Route::post('bookHome',[BookHomeController::class,'bookHome'])->middleware('auth:api');
///UserHomes
// Route::post('userHomes/addHome', [AddHomeController::class, 'store'])->middleware('auth:api');
// Route::get('/UserHomes/homes', [ShowUserHomeController::class, 'index'])->name('user.homes.index')->middleware('auth:api');
// Route::get('/UserHomes/bookings', [UserHomeBookingsController::class, 'show'])->name('user.home.bookings.show')->middleware('auth:api');
// Route::post('/UserHomes/booking/change-status', [ChangeBookingStatusController::class, 'changeStatus'])
//     ->middleware('auth:api');
?>
