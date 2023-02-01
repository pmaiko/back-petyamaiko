<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\ProjectsComments;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ProjectsCommentsController extends Controller
{
    static function index (Request $request) {
        $request->validate([
           'project_id' => 'required'
        ]);

        $comments = ProjectsComments::where('project_id', $request->project_id)->get();

        return response()->json($comments);
    }

    static function post (Request $request) {
        $comment = $request->validate([
            'project_id' => 'required',
            'name' => 'required|min:3',
            'comment' => 'required|min:5'
        ]);

        $comment = ProjectsComments::create($comment);

        return response()->json($comment);
    }
}
