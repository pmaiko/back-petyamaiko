<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
use App\Http\Controllers\PagesController;

Route::get('/', function () {
    return view('home');
})->name('home');


//pages
Route::get('/pages', function () {
  $pages = [PagesController::class, 'index']();
  $data = [
    'pages' => $pages
  ];
  return view('pages.index', $data);
})->name('pages.index');

Route::get('/pages/edit/{id}', function ($id) {
  $page = [PagesController::class, 'getById']($id);
  return view('pages.edit', compact('page'));
})->name('pages.edit');

Route::post('/pages/edit/{id}', function (Request $request) {
  return [PagesController::class, 'update']($request);
})->name('pages.edit');
//pages end


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