<?php

namespace App\Http\Controllers\Api;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\GlobalData;

class GlobalDataController extends BaseController {
    public function index () {
        return response()->json(GlobalData::getData());
    }
}
