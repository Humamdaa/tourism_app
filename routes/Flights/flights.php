<?php

use App\Http\Controllers\FlightGo\flightsGo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('flightsGo',[flightsGo::class,'Flights']);
