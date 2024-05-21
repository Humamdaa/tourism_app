<?php

use App\Http\Controllers\currency\convertCurrency;
use App\Http\Controllers\currency\getAllsymobol;
use App\Http\Controllers\currency\setCurrency;
use Illuminate\Support\Facades\Route;

Route::get('allCurrencies',[getAllsymobol::class,'getSymbols']);
Route::get('convert',[convertCurrency::class,'convert'])->middleware('auth:api');
Route::get('setCurrency',[setCurrency::class,'setCurrency'])->middleware('auth:api');
