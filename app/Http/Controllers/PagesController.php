<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\SectionMainBanner;
use App\Models\PagesSections;
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

    $page = Pages::where('id', $id)->first();
    $sections = $page->sections->sortBy('position')->toArray();

    $var = [
      'page' => $page->toArray(),
      'sections' => array_map(function ($section) {
        return array_merge(['id' => $section['id']], json_decode($section['data'], true));
      }, $sections),
    ];

    return $var;
  }

  function update ($request) {
    $request->validate([
      'title' => 'required',
      'description' => 'required',
      'section_name.*' => 'required',
      'section_main_banner__title.*' => 'exclude_if:section_main_banner__delete.*,1|required_if:section_name.*,section_main_banner|min:1',
      'section_main_banner__description.*' => 'exclude_if:section_main_banner__delete.*,1|required_if:section_name.*,section_main_banner|min:1',
      'section_main_banner__button_label.*' => 'exclude_if:section_main_banner__delete.*,1|required_if:section_name.*,section_main_banner|min:1',
      'section_main_banner__hint.*' => 'exclude_if:section_main_banner__delete.*,1|required_if:section_name.*,section_main_banner|min:1',
      'section_main_banner__image.*' => 'exclude_if:section_main_banner__delete.*,1|required_if:section_name.*,section_main_banner|min:1',

      'section_services__title.*' => 'exclude_if:section_services__delete.*,1|required_if:section_name.*,section_services|min:1',
      'list.*' => 'exclude_if:section_services__delete.*,1|required_if:section_name.*,section_services|min:1',
//      'section_main_banner__image' => 'required_if:section_main_banner,==,true',
//      'section_main_banner__delete' => 'required_if:section_main_banner,==,true',
    ]);

    Pages::where('id', $request->id)->update([
      'title' => $request->title,
      'description' => $request->description
    ]);

//    dd($request);
    foreach ($request->section_name as $index => $value) {
      $section_id = $request->section_id[$index];
      $key = $section_id ?? $index;

      $section = [
        'position' => $request->position[$key] ?? null,
        'name' => $request->section_name[$key],
        'page_id' => $request->id
      ];

      $delete = null;

      if ($request->section_name[$key] === 'section_main_banner') {
        $section = array_merge($section, [
          'image' => $request->section_main_banner__image[$key],
          'title' => $request->section_main_banner__title[$key],
          'description' => $request->section_main_banner__description[$key],
          'button_label' => $request->section_main_banner__button_label[$key],
          'hint' => $request->section_main_banner__hint[$key],
        ]);

        $delete = $request->section_main_banner__delete[$key] ?? null;
      }

      if ($request->section_name[$key] === 'section_services') {
        $section = array_merge($section, [
          'title' => $request->section_services__title[$key],
          'list' => json_decode($request->section_services__list[$key]),
        ]);

        $delete = $request->section_services__delete[$key] ?? null;
      }

      if ($request->section_name[$key] === 'section_projects') {
        $section = array_merge($section, [
          'title' => $request->section_projects__title[$key]
        ]);

        $delete = $request->section_projects__delete[$key] ?? null;
      }


      // seve
      if (empty($section_id)) {
        PagesSections::create([
          'page_id' => $request->id,
          'data' => json_encode($section),
          'created_at' => Date::now()->toDateTimeString()
        ]);
      } else {
        if (empty($delete)) {
          PagesSections::where('id', $section_id)->update([
            'page_id' => $request->id,
            'data' => json_encode($section),
            'updated_at' => Date::now()->toDateTimeString()
          ]);
        } else {
          PagesSections::where('id', $section_id)->delete();
        }
      }
    }

    return redirect()->back()->with('status', 'Success');
  }
}
