<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GlobalData;


class GlobalDataController extends Controller {
    public function index () {
        return response()->json(GlobalData::getData());
    }
}
