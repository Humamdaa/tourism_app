<?php

use App\Http\Controllers\auth\ResetPass;
//use App\Http\Controllers\cities\CountryController;
use App\Http\Controllers\auth\GoogleAuthController;
use App\Mail\register\welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Route::get('fieldEmail',function (){
//     return view('emailReset');
//  })->name('password.request');
//  Route::post('fieldEmail',[ResetPass::class,'sendResetLinkEmail'])->name('password.email');
// Route::get('newPass',function (){
//     return view('newPassword');
// })->name('password.reset');
// Route::post('newPass',[ResetPass::class,'reset'])->name('password.update');

//google auth
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
