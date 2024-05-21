<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\ResetPass;
use App\Http\Controllers\verify\VerifyRegister;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\GoogleAuthController;

//restrict the number of requests per minute from an IP address.
Route::middleware('throttle:60,1')->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post('registerUser', 'register');
        Route::post('loginUser', 'login');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('logoutUser', 'logout')->middleware('auth:api')->name('out');
    Route::get('trying', function () {
        return 'success login inside system';
    })->middleware('auth:api');
});

Route::post('/verify/account', [verifyRegister::class, 'verifyRegister'])->name('verify.account');

//check middleware/Authenticate:
Route::get('unAuth', function () {
    $tr = new TranslateMessages();
    return response()->json([
        'message' => $tr->translate('unAuthorized, please login'),
        'status' => 404
    ], 404);
})->name('UnAuth');

//reset
Route::post('fieldEmail', [ResetPass::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('newPass', function () {
    return view('newPassword');
})->name('password.reset');
Route::post('newPass', [ResetPass::class, 'resetPa'])->name('password.update');


//Route::post('newPass', [ResetPass::class, 'reset'])->name('password.update');

//google login
//Route::group(['prefix' => 'auth'], function () {
//    Route::get('google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
//    Route::get('google/callback', [GoogleAuthController::class, 'callbackGoogle']);
//});
