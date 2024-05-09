<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\ResetPass;
use App\Http\Controllers\verify\VerifyRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\GoogleAuthController;
use App\Http\Controllers\auth\ProfileController;

//->middleware('auth:api')
Route::post('profile/editName', [ProfileController::class, 'editName']);
