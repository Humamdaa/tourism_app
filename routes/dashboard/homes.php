<?php

use App\Http\Controllers\Admin\Homes\AdminHomeController;
use App\Http\Controllers\stays\Homes\userHomes\AddHomeController;
use App\Http\Controllers\stays\Homes\userHomes\ChangeBookingStatusController;
use App\Http\Controllers\stays\Homes\userHomes\ShowUserHomeController;
use App\Http\Controllers\stays\Homes\userHomes\UserHomeBookingsController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/admin/homes', [AdminHomeController::class, 'index'])->name('admin.homes.index');
Route::get('/admin/homes/{id}', [AdminHomeController::class, 'show'])->name('admin.homes.show');
Route::post('/admin/homes/{id}/delete', [AdminHomeController::class, 'destroy'])->name('admin.homes.destroy');
Route::post('/admin/homes/{id}/verify', [AdminHomeController::class, 'verify'])->name('admin.homes.verify');


//for User

//Route::middleware('role')->group(function () {
//Route::get('userHomes/home', [AddHomeController::class, 'create'])->name('user.homes.addHome')->middleware('role');
//// Route::get('userHomes/home', [AddHomeController::class, 'create'])->name('user.homes.addHome');
//Route::post('userHome/addHome', [AddHomeController::class, 'store'])->name('store.home')->middleware('role');
//Route::get('/UserHome/homes', [ShowUserHomeController::class, 'index'])->name('user.homes.index')->middleware('role');
//Route::get('/UserHome/bookings', [UserHomeBookingsController::class, 'show'])->name('user.home.bookings.show')->middleware('role');
//Route::post('/UserHome/booking/change-status', [ChangeBookingStatusController::class, 'changeStatus'])->middleware('role');
//});

