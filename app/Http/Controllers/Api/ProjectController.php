<?php

namespace App\Http\Controllers\Api;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProjectController extends BaseController
{
    function post (Request $request)
    {
        $request->validate([
            'image' => 'required',
            'label' => 'required|min:5',
            'description' => 'required|min:5'
        ]);

        DB::table('projects')->insert([
            "image" => $request->image,
            "label" => $request->label,
            "description" => $request->description,
            "created_at" => Date::now()->toDateTimeString()
        ]);

        return response()->json([
            "success" => true
        ]);
    }

    function update (Request $request)
    {
        $request->validate([
            'id' => 'required',
            'image' => 'required',
            'label' => 'required|min:5',
            'description' => 'required|min:5'
        ]);

        DB::table('projects')->where('id', $request->id)->update([
            "image" => $request->image,
            "label" => $request->label,
            "description" => $request->description,
            "created_at" => Date::now()->toDateTimeString()
        ]);

        return response()->json([
            "success" => true
        ]);
    }

    function delete (Request $request) {
        $request->validate([
            'id' => 'required'
        ]);

        DB::table('projects')->where('id', $request->id)->delete();

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
        $likes = DB::table('projects')->where('id', $id)->value('likes') ?? 0;

        if ($like) {
            $likes = $likes + 1;
        } else {
            $likes--;

            if ($likes < 0) {
                $likes = null;
            }
        }

        DB::table('projects')->where('id', $id)->update([
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
        $views = DB::table('projects')->where('id', $id)->value('views') ?? 0;

        if ($view) {
            $views = $views + 1;
        } else {
            $views--;

            if ($views < 0) {
                $views = null;
            }
        }

        DB::table('projects')->where('id', $id)->update([
            'views' => $views
        ]);

        return response()->json([
            "success" => true
        ]);
    }
}
