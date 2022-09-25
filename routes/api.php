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
Route::get('/projects', 'App\Http\Controllers\Api\ProjectsController@index');
Route::post('/project', 'App\Http\Controllers\Api\ProjectController@post');
Route::put('/project', 'App\Http\Controllers\Api\ProjectController@update');
Route::put('/project-view', 'App\Http\Controllers\Api\ProjectController@view');
Route::put('/project-like', 'App\Http\Controllers\Api\ProjectController@like');