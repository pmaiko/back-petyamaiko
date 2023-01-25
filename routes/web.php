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
use App\Http\Controllers\Api\ProjectsController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Storage;

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
  return view('pages.edit', [PagesController::class, 'getPage']($id));
})->name('pages.edit');

Route::post('/pages/edit/{id}', function (Request $request) {
  return [PagesController::class, 'update']($request);
})->name('pages.edit');
//pages end


Route::get('/pages/create', function () {
    return view('pages.create');
})->name('pages.create');

Route::get('/info', function () {
    return view('info');
})->name('info');

Route::get('/greeting', function () {
    return 'Hello World';
});

function getFile ($filename) {
  $path = storage_path('app/' . $filename);

  if (!File::exists($path)) {
    $path = $filename;

    $contents = collect(Storage::cloud()->listContents('/', false));

    $file = $contents
      ->where('type', '=', 'file')
      ->where('path', '=', $path)
      ->first();
    $rawData = Storage::cloud()->get($path);

    $filename = $file['name'];

    if (empty($rawData)) {
      abort(404);
    }

    return response($rawData, 200)
      ->header('Content-Type', $file['mimetype'].'+xml')
      ->header('Cache-Control', 'public, max-age=315360000')
      ->header('Content-Disposition', "attachment; filename=$filename");
  }

  $file = File::get($path);
  $type = File::mimeType($path);

  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);

  return $response;
}

Route::get('/storage/{filename}', function ($filename) {
  return getFile($filename);
});

Route::get('/api/storage/all', function () {
  $contents = collect(Storage::cloud()->listContents('/', false))->toArray();

  return response()->json($contents);
});

Route::delete('/api/storage/{path}', function ($path) {
  Storage::cloud()->delete($path);
});

//php artisan cache:clear
//php artisan route:clear
//php artisan config:clear
//projects
Route::get('/projects', function () {
  $projects = [ProjectsController::class, 'index']();

  $data = [
    'projects' => $projects
  ];

  return view('projects.index', $data);
})->name('projects.index');

Route::get('/projects/create', function () {
  return view('projects.create');
})->name('projects.create');

Route::post('/projects/create', function (Request $request) {
  [ProjectController::class, 'post']($request);
  return redirect()->back()->with('status', 'Success');
})->name('projects.create');

Route::get('/projects/update/{id}', function ($id) {
  $project = [ProjectController::class, 'indexCollect']($id);
  $data = [
    'project' => $project->toArray()
  ];
  return view('projects.update', $data);
})->name('projects.update');

Route::post('/projects/update/{id}', function (Request $request) {
  [ProjectController::class, 'update']($request);
  return redirect()->back()->with('status', 'Success');
})->name('projects.update');

Route::post('/projects/delete/{id}', function (Request $request) {
  [ProjectController::class, 'delete']($request);
  return redirect()->back()->with('status', 'Success');
})->name('projects.delete');