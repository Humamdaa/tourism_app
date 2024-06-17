<?php

use App\Http\Controllers\stays\Homes\HomeController;
use App\Http\Controllers\stays\Homes\MyHomeBookController;
use App\Http\Controllers\stays\Homes\Add_RemoveHomeFavoriteController;
use App\Http\Controllers\stays\Homes\BookHomeController;
use App\Http\Controllers\stays\Homes\FavoriteHomesController;
use App\Http\Controllers\stays\Homes\InsideHomePageController;
use App\Models\favorite\FavoriteHomes;
use Illuminate\Support\Facades\Route;

Route::get('homes',[HomeController::class,'getHomesByCityName']);
Route::get('homes/myHomeBookings', [MyHomeBookController::class, 'getMyHomeBooking'])->middleware('auth:api');
Route::get('addRemoveHomeToFav',[Add_RemoveHomeFavoriteController::class,'changeFav'])->middleware('auth:api');
Route::get('favoriteHomes',[FavoriteHomesController::class,'getFavHomes'])->middleware('auth:api');
Route::get('InsideHomePage',[InsideHomePageController::class,'insideHome'])->middleware('auth:api');//,'session'
Route::get('bookHome',[BookHomeController::class,'bookHome'])->middleware('auth:api')
?>
