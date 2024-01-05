<?php

use Illuminate\Support\Facades\Route;
use App\Arrival\Controllers\AllArrivalsController;

Route::middleware(['auth'])->group(function () {
    Route::get('arrivals', [AllArrivalsController::class, 'getAllDatas']);
    Route::post('arrivals', [AllArrivalsController::class, 'addArrival']);
});