<?php

<<<<<<< HEAD
use App\Http\Controllers\FlightGo\BookFlightGoController;
=======
>>>>>>> parent of 4837944 (get go flights, start book go flight)
use App\Http\Controllers\FlightGo\flightsGo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('flightsGo',[flightsGo::class,'Flights']);
<<<<<<< HEAD

Route::get('bookFlight',[BookFlightGoController::class,'book'])
    ->middleware('auth:api');

=======
>>>>>>> parent of 4837944 (get go flights, start book go flight)
