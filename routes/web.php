<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\ResetPass;

//use App\Http\Controllers\cities\CountryController;
use App\Http\Controllers\auth\GoogleAuthController;
use App\Http\Controllers\stays\Hotels\HotelController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;
use GuzzleHttp\Client;
use AmrShawky\LaravelCurrency\Facade\Currency;


//google auth
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
Route::get('', function () {
    return 'hello';
});


Route::get('cur',function (){
    $client = new \CurrencyApi\CurrencyApi\CurrencyApiClient('YOUR-API-KEY');
    var_dump($client->currencies());
});
