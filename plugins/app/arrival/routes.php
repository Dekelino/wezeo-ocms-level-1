<?php

use App\Arrival\Http\Controllers\AllArrivalsController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "api"], function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('all-arrivals', [AllArrivalsController::class, 'getAllDatas']);
        Route::post('arrivals', [AllArrivalsController::class, 'addArrival']);
        Route::get('user-arrivals', [AllArrivalsController::class, 'getUserArrivals']);
    });
});