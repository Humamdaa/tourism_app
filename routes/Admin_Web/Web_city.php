<?php
use App\Http\Controllers\UserLocation;
use App\Http\Controllers\Web\City\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('Web_city', CityController::class);
