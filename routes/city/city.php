<?php

use App\Http\Controllers\city\SearchCityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\city\CityController;

Route::get('cities',[CityController::class,'getCities']);
Route::get('searchCity',[SearchCityController::class,'searchCity']);
