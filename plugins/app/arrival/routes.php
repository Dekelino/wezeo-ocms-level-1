<?php

use Illuminate\Support\Facades\Route;
use App\Arrival\Controllers\AllArrivalsController;

Route::group(["prefix" => "api"], function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('all-arrivals', [AllArrivalsController::class, 'getAllDatas']);
        Route::post('arrivals', [AllArrivalsController::class, 'addArrival']);
        Route::get('user-arrivals', [AllArrivalsController::class, 'getUserArrivals']);
    });
});