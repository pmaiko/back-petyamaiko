<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller {
  public function post (Request $request) {
    $file = $request->file('file');
    echo $file->getClientOriginalName();
    Storage::disk('google')->put($file->getClientOriginalName(), file_get_contents($file));
//    Storage::disk('local')->put('example.txt', 'Contents');
    echo 1;
  }
}
