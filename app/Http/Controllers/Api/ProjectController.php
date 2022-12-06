<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Projects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    function index ($id) {
        if ($id) {
            $project = Projects::where('id', $id)->first();
            return response()->json($project);
        }
    }

    function indexCollect ($id) {
        if ($id) {
          return Projects::where('id', $id)->first();
        }
    }

    function post (Request $request)
    {
        $request->validate([
            'image' => 'required',
            'label' => 'required|min:5',
            'description' => 'required|min:5'
        ]);

        $project = Projects::create([
            "image" => $request->image,
            "label" => $request->label,
            "description" => $request->description,
            "created_at" => Date::now()->toDateTimeString()
        ]);

        return response()->json($project);
    }

    function update (Request $request)
    {
        $request->validate([
            'id' => 'required',
            'image' => 'required',
            'label' => 'required|min:5',
            'description' => 'required|min:5'
        ]);

        Projects::where('id', $request->id)->update($request->toArray());

        $project = Projects::where('id', $request->id)->first();

        return response()->json($project);
    }

    function delete (Request $request) {
        $request->validate([
            'id' => 'required'
        ]);

        Projects::where('id', $request->id)->delete();

        return response()->json([
            "success" => true
        ]);
    }

    function like (Request $request) {
        $request->validate([
            'id' => 'required',
            'like' => 'required|boolean'
        ]);

        $id = $request->id;
        $like = $request->like;
        $likes = Projects::where('id', $id)->value('likes') ?? 0;

        if ($like) {
            $likes = $likes + 1;
        } else {
            $likes--;

            if ($likes < 0) {
                $likes = null;
            }
        }

        Projects::where('id', $id)->update([
            'likes' => $likes
        ]);

        return response()->json([
            "success" => true
        ]);
    }

    function view (Request $request) {
        $request->validate([
            'id' => 'required',
            'view' => 'required|boolean'
        ]);

        $id = $request->id;
        $view = $request->view;
        $views = Projects::where('id', $id)->value('views') ?? 0;

        if ($view) {
            $views = $views + 1;
        } else {
            $views--;

            if ($views < 0) {
                $views = null;
            }
        }

        Projects::where('id', $id)->update([
            'views' => $views
        ]);

        return response()->json([
            "success" => true
        ]);
    }
}
