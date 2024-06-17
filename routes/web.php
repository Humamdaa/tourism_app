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
use App\Http\Controllers\StripeController;

//google auth
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
Route::get('', function () {
    return 'hello';
});


// Route::get('cur',function (){
//     $client = new \CurrencyApi\CurrencyApi\CurrencyApiClient('YOUR-API-KEY');
//     var_dump($client->currencies());
// });

//Route::get('stripe',[StripeController::class,'chedkOut']);

Route::get('/', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/test', 'App\Http\Controllers\StripeController@test');
Route::post('/live', 'App\Http\Controllers\StripeController@live');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
