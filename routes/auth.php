<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//restrict the number of requests per minute from an IP address.
Route::middleware('throttle:60,1')->group(function () {

Route::controller(AuthController::class)->group(function () {
    Route::post('registerUser', 'register');
    Route::post('loginUser', 'login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('logoutUser', 'logout');
})->middleware('auth:api');

});
