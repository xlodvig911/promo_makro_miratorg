<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreateWinnerController;


Route::get('/', [PromoController::class, 'index'])->name('promo.index');
Route::post('/promo', [PromoController::class, 'store'])->name('promo.store');

Route::get('login', [AdminController::class, 'login'])->name('admin.login');
Route::post('login', [AdminController::class, 'login_verify'])->name('admin.login_verify');

Route::group(['middleware' => 'auth', 'auth.session'], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::post('/winner_3', [CreateWinnerController::class, 'winner_3'])->name('admin.winner_3');
    Route::post('/winner_2', [CreateWinnerController::class, 'winner_2'])->name('admin.winner_2');
    Route::post('/winner_1', [CreateWinnerController::class, 'winner_1'])->name('admin.winner_1');
});
