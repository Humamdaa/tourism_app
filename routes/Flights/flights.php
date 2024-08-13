<?php


use App\Http\Controllers\FlightGo\BookFlightGoController;

use App\Http\Controllers\FlightGo\cancelBookController;
use App\Http\Controllers\FlightGo\flightsGo;
use App\Http\Controllers\FlightGo\myFlightGoBookedController;
use App\Http\Controllers\FlightRound\BookFlightRoundController;
use App\Http\Controllers\FlightRound\cancelBookRoundController;
use App\Http\Controllers\FlightRound\flightRoundController;
use App\Http\Controllers\FlightRound\myFlightRoundBookedController;
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
Route::get('flightsRound',[flightRoundController::class,'FlightRound']);

Route::post('bookFlightRound',[BookFlightRoundController::class,'book'])
    ->middleware('auth:api');

Route::delete('delFlightRound',[cancelBookRoundController::class,'cancelFlightRound'])
    ->middleware('auth:api');

Route::get('myFlightRoundBooked',[myFlightRoundBookedController::class,'myFlightRound'])
    ->middleware('auth:api');
