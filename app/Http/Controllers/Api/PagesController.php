<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function index (Request $request) {
      $page = Pages::where('alias', $request->alias)->first();
      $sections = $page->sections->toArray();

      $out_sections = array();

      foreach ($sections as $section) {
        $data = json_decode($section['data'], true);
        $name = $data['name'];

        if ($name === 'section_projects') {
          $projects = ProjectsController::index();
          $data = array_merge($data, [
            'projects' => $projects
          ]);
        }

        array_push($out_sections, [
          'name' => $name,
          'attributes' => array_filter($data, function ($key) {
            return $key !== 'name' && $key !== 'page_id' && $key !== 'position';
          }, ARRAY_FILTER_USE_KEY)
        ]);
      }

      return response()->json([
        'title' => $page->title,
        'description' => $page->description,
        'sections' => $out_sections
      ]);
    }
}
