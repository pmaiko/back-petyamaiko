<?php

namespace App\Http\Controllers\Api;

use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\Validator; // include this at top
//
//$validation = Validator::make($request->all() ,[
//    'student_mobile'   =>  'required|digits:10',
//    'student_name'     =>  'required|min:3|max:50',
//    'student_email'    =>  'email:rfc|max:50',
//]);
//
//if($validation->fails()) {
//    // validation failed
//} else {
//    // validation passed
//}

class WorksController extends BaseController
{
    function index ()
    {
        $works = Works::all();
        return $works->toArray();
    }
}
