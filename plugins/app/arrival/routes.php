<?php
//documentation - https://docs.octobercms.com/3.x/extend/system/routing.html#global-middleware
Route::group(['prefix' => 'api'], function () {
    Route::get('/arrivals', 'App\Arrival\Controllers\AllArrivalsController@getAllDatas');
    Route::post('/addArrival', 'App\Arrival\Controllers\AllArrivalsController@addArrival');
    //matches the "/api/arrivals api
    Route::get('/hello', function () {
        return 'Hello, World!';
    });

    //users 
    Route::post('/createUser', 'App\Arrival\Controllers\UsersController@createUser');
    
});
