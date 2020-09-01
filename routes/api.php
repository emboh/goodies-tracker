<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Auth'], function ()
{
    Route::post('login', 'AuthenticationController@login');

    Route::post('logout', 'AuthenticationController@logout');
});

Route::group(['middleware' => ['auth:sanctum']], function ()
{
    Route::apiResource('items', 'ItemController');

    Route::get('summary', 'SummaryController');
});