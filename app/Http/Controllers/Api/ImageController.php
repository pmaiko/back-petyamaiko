<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller {
  public function post () {
    Storage::disk('google')->put('test.txt', 'Hello World');
    Storage::disk('local')->put('example.txt', 'Contents');
    echo 1;
  }
}
