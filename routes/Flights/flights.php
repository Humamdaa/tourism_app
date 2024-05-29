<?php

use App\Http\Controllers\Flights\FlightsGo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('flights',[]);

Route::get('flightsGo',[FlightsGo::class,'Flights']);
