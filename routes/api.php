<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('conversations')->name('conversations.')->group(function () {
    Route::prefix('{conversation}')->group(function () {
        Route::get('messages', 'MessageController@get')->name('get');

        Route::post('messages', 'MessageController@send')->name('send');
    });
});