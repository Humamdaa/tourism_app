<?php

use App\Http\Controllers\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('flight',function (){
    return view('dashboard/index');
})->name('flight');

//Route::get('nav_bar',function (){
//    return view('dashboard/nav_bar/nav');
//})->name('nav_bar');
//
//Route::get('cont',function (){
//    return view('dashboard/container/container');
//});

Route::get('city',function (){
    return view('dashboard/city/city');
})->name('city');
