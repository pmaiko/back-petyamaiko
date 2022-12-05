<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\SectionMainBanner;
use App\Models\PagesBlocks;
use Illuminate\Support\Facades\Date;
use App\Entity\Post;

class PagesController extends Controller
{
  function index () {
    return Pages::all()->toArray();

    //    try {
    //      throw \Exception('adasdd');
    //    } catch (\Throwable $e) {
    //
    //    }
  }

  function getPage ($id) {
//https://github.com/barryvdh/laravel-debugbar
//посмотреть скопы
//посмотреть карбон для времени
//exclude_if:section_main_banner__delete.*,1|required_if:section_name.*,section_main_banner|min:1
//exclude_if:section_services__delete.*,1|required_if:section_name.*,section_services|min:1

    $page = Pages::where('id', $id)->first();
    $blocks = array_values($page->blocks->sortBy('position')->toArray());

    $result = [
      'page' => array_filter($page->toArray(), function ($key) {
        return $key !== 'blocks';
      }, ARRAY_FILTER_USE_KEY),
      'blocks' => array_map(function ($block) {
        return array_merge(
          [
            'id' => $block['id'],
            'name' => $block['name'],
            'position' => $block['position'],
          ],
          json_decode($block['data'], true));
      }, $blocks),
    ];

    return $result;
  }

  function update ($request) {
        $request->validate([
          'title' => 'required',
          'description' => 'required',
          'blocks' => 'required',
          'blocks.*.name' => 'required'
        ]);

    Pages::where('id', $request->id)->update([
      'title' => $request->title,
      'description' => $request->description
    ]);

    foreach ($request->blocks as $id => $data) {
      $uniqKeys = array('id', 'name', 'position', 'remove');

      $block_id = $id;
      $block_name = $data['name'];
      $block_position = $data['position'] ?? 0;
      $block_remove = $data['remove'] ?? null;

      $block_data = array_filter($data, function ($key) use ($uniqKeys) {
        return !in_array($key, $uniqKeys);
      }, ARRAY_FILTER_USE_KEY);

      // save
      if (empty($block_id) || $block_id === 'null') {
        PagesBlocks::create([
          'page_id' => $request->id,
          'name' => $block_name,
          'position' => $block_position,
          'data' => json_encode($block_data),
          'created_at' => Date::now()->toDateTimeString()
        ]);
      } else {
        if (empty($block_remove)) {
          PagesBlocks::where('id', $block_id)->update([
            'page_id' => $request->id,
            'name' => $block_name,
            'position' => $block_position,
            'data' => json_encode($block_data),
            'updated_at' => Date::now()->toDateTimeString()
          ]);
        } else {
          PagesBlocks::where('id', $block_id)->delete();
        }
      }
    }

    return redirect()->back()->with('status', 'Success');
  }
}
