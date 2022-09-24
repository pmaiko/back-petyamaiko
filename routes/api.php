<?php

use Illuminate\Http\Request;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/global-data', 'App\Http\Controllers\Api\GlobalDataController@index');
Route::get('/works', 'App\Http\Controllers\Api\WorksController@index');
Route::post('/work', 'App\Http\Controllers\Api\WorkController@post');
Route::put('/work', 'App\Http\Controllers\Api\WorkController@update');
Route::put('/work-view', 'App\Http\Controllers\Api\WorkController@view');
Route::put('/work-like', 'App\Http\Controllers\Api\WorkController@like');