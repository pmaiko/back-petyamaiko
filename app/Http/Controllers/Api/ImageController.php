<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

//https://gist.github.com/sergomet/f234cc7a8351352170eb547cccd65011
//https://developers.google.com/oauthplayground

class ImageController extends Controller {
  public function post (Request $request) {
    $file = $request->file('file');
    $filename = $file->getClientOriginalName();

    Storage::disk('google')->put($filename, file_get_contents($file));

    $contents = collect(Storage::cloud()->listContents('/', false));

    $file = $contents
      ->where('type', '=', 'file')
      ->where('name', '=', $filename)
      ->first();
    $rawData = Storage::cloud()->get($file['path']);

    return response($rawData, 200)
      ->header('Content-Type', $file['mimetype'])
      ->header('Content-Disposition', "attachment; filename='$filename'");
  }
}
