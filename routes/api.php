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

Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');

Route::get('/global-data', 'App\Http\Controllers\Api\GlobalDataController@index');
Route::get('/projects', 'App\Http\Controllers\Api\ProjectsController@index');
Route::get('/project/{id}', 'App\Http\Controllers\Api\ProjectController@index');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/user', 'App\Http\Controllers\Api\AuthController@user');
    Route::post('/logout', 'App\Http\Controllers\Api\AuthController@logout');

    Route::post('/project', 'App\Http\Controllers\Api\ProjectController@post');
    Route::put('/project', 'App\Http\Controllers\Api\ProjectController@update');
    Route::delete('/project', 'App\Http\Controllers\Api\ProjectController@delete');
});

Route::put('/project-view', 'App\Http\Controllers\Api\ProjectController@view');
Route::put('/project-like', 'App\Http\Controllers\Api\ProjectController@like');

Route::get('/projects-comments', 'App\Http\Controllers\Api\ProjectsCommentsController@index');
Route::post('/projects-comments', 'App\Http\Controllers\Api\ProjectsCommentsController@post');