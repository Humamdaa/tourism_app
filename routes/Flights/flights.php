<?php


use App\Http\Controllers\FlightGo\BookFlightGoController;

use App\Http\Controllers\FlightGo\bookFlightGo;
use App\Http\Controllers\FlightGo\flightsGo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('flightsGo',[flightsGo::class,'Flights']);

Route::get('bookFlight',[BookFlightGoController::class,'book'])
    ->middleware('auth:api');

Route::get('bookGoFlight',[bookFlightGo::class,'book']);
