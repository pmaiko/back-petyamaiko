<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/pages', function () {
    return view('pages.index');
})->name('pages.index');

Route::get('/pages/create', function () {
    return view('pages.create');
})->name('pages.create');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/info', function () {
    return view('info');
})->name('info');

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/storage/{filename}', function ($filename) {
  $path = storage_path('app/' . $filename);

  if (!File::exists($path)) {
    abort(404);
  }

  $file = File::get($path);
  $type = File::mimeType($path);

  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);

  return $response;
});