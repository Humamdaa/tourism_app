<?php


use App\Http\Controllers\FlightGo\BookFlightGoController;

use App\Http\Controllers\FlightGo\cancelBookController;
use App\Http\Controllers\FlightGo\flightsGo;
use App\Http\Controllers\FlightGo\myFlightGoBookedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('flightsGo',[flightsGo::class,'Flights']);

Route::get('bookFlight',[BookFlightGoController::class,'book'])
    ->middleware('auth:api');

Route::delete('delFlightGo',[cancelBookController::class,'cancelFlightGo'])
    ->middleware('auth:api');

Route::get('myFlightGoBooked',[myFlightGoBookedController::class,'myFlightGo'])
    ->middleware('auth:api');

// round flight

