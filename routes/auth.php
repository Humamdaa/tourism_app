<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\ResetPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;

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

//reset
Route::post('fieldEmail', [ResetPass::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('newPass', function () {
    return view('newPassword');
})->name('password.reset');
Route::post('newPass', [ResetPass::class, 'reset'])->name('password.update');

//google login
      // Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
      // Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

