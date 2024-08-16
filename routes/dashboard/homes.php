
<?php

use App\Http\Controllers\Admin\Homes\AdminHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/homes', [AdminHomeController::class, 'index'])->name('admin.homes.index');
Route::get('/admin/homes/{id}', [AdminHomeController::class, 'show'])->name('admin.homes.show');
Route::post('/admin/homes/{id}/delete', [AdminHomeController::class, 'destroy'])->name('admin.homes.destroy');
Route::post('/admin/homes/{id}/verify', [AdminHomeController::class, 'verify'])->name('admin.homes.verify');
