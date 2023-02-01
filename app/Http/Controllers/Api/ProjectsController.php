<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Projects;

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

class ProjectsController extends Controller
{
    static function index ()
    {
        $projects = Projects::all();
        return $projects->toArray();
    }
}
