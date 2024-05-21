<?php

use App\Http\Controllers\Translate\translateController;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Route;

Route::get('allLang',[translateController::class,'getAllLang']);
Route::get('setLang',[translateController::class,'setLang'])->middleware('auth:api');//,'session'
