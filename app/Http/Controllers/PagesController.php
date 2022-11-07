<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\SectionMainBanner;
use App\Models\PagesSections;
use Illuminate\Support\Facades\Date;

class PagesController extends Controller
{
  function index () {
    return Pages::all()->toArray();
  }

  function getPage ($id) {
    $page = Pages::where('id', $id)->first()->toArray();
    $sections = PagesSections::where('page_id', $id)->get()->toArray();

    $newSections = [];
    foreach ($sections as $section) {
      if ($section['section_name'] === 'section_main_banner') {
        $section['data'] = SectionMainBanner::where('page_id', $section['page_id'])->first()->toArray();;
        array_push($newSections, $section);
      }
    }

    return [
      'page' => $page,
      'sections' => $newSections,
    ];
  }

  function update ($request) {
    dump($request);
    die;
    $request->validate([
      'title' => 'required',
      'description' => 'required',
      'section_main_banner_title' => 'required_if:section_main_banner,==,true',
      'section_main_banner_description' => 'required_if:section_main_banner,==,true',
      'section_main_banner_button_label' => 'required_if:section_main_banner,==,true',
      'section_main_banner_hint' => 'required_if:section_main_banner,==,true',
//      'section_main_banner_image' => 'required_if:section_main_banner,==,true',
    ]);

    Pages::where('id', $request->id)->update([
      'title' => $request->title,
      'description' => $request->description
    ]);

    if (empty($request->section_main_banner_id)) {
      $section = SectionMainBanner::create([
        'image' => 1,
        'title' => $request->section_main_banner_title,
        'description' => $request->section_main_banner_title,
        'button_label' => $request->section_main_banner_title,
        'hint' => $request->section_main_banner_title,
        'page_id' => $request->id,
        'created_at' => Date::now()->toDateTimeString()
      ]);
      PagesSections::create([
        'page_id' => $request->id,
        'section_id' => $section->id,
        'section_name' => 'section_main_banner',
        'created_at' => Date::now()->toDateTimeString()
      ]);
    } else {
      SectionMainBanner::where('id', $request->section_main_banner_id)->update([
        'image' => 1,
        'title' => $request->section_main_banner_title,
        'description' => $request->section_main_banner_description,
        'button_label' => $request->section_main_banner_button_label,
        'hint' => $request->section_main_banner_hint,
        'page_id' => $request->id,
        'updated_at' => Date::now()->toDateTimeString()
      ]);
    }

    return redirect()->back()->with('status', 'Success');
  }
}
