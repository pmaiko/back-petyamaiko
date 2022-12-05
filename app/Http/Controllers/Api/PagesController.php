<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function index (Request $request) {
      $page = Pages::where('alias', $request->alias)->first();
      $blocks = array_values($page->blocks->sortBy('position')->toArray());

      $out_blocks = array();

      foreach ($blocks as $block) {
        $data = json_decode($block['data'], true);
        $name = $block['name'];

        if ($name === 'block_projects') {
          $projects = ProjectsController::index();
          $data = array_merge($data, [
            'projects' => $projects
          ]);
        }

        // array push
        $out_blocks[] = [
          'name' => $name,
          'attributes' => $data
        ];
      }

      return response()->json([
        'title' => $page->title,
        'description' => $page->description,
        'blocks' => $out_blocks
      ]);
    }
}
