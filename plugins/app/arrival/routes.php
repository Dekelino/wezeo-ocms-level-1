<?php
//documentation - https://docs.octobercms.com/3.x/extend/system/routing.html#global-middleware
Route::group(['prefix' => 'api'], function () {
    Route::apiResource('arrivals', 'App\Arrival\Controllers\AllArrivalsController');
    Route::get('/arrivals', 'App\Arrival\Controllers\AllArrivalsController@getAllDatas');
    Route::post('/addArrival', 'App\Arrival\Controllers\AllArrivalsController@addArrival');
    //matches the "/api/arrivals api
    Route::get('/hello', function () {
        return 'Hello, World!';
    });

    //users 
    Route::post('/createUser', 'App\Arrival\Controllers\UsersController@createUser');
    Route::post('/loginUser', 'App\Arrival\Controllers\UsersController@loginUser');

});
