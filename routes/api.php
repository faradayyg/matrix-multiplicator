<?php

use Illuminate\Http\Request;

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

Route::post('/login', 'Auth\LoginController@getToken');

Route::group(['middleware' => 'auth:airlock'], function () {
    Route::post('/matrix/multiply', 'MatrixController@multiply')->name('matrix.multiply');
});