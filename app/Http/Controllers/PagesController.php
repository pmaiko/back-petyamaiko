<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\SectionMainBanner;
use Illuminate\Support\Facades\Date;

class PagesController extends Controller
{
  function index () {
    return Pages::all()->toArray();
  }

  function getPage ($id) {
    return Pages::where('id', $id)->first()->toArray();
  }

  function update ($request) {
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
      SectionMainBanner::create([
        'title' => $request->section_main_banner_title,
        'description' => $request->section_main_banner_title,
        'button_label' => $request->section_main_banner_title,
        'hint' => $request->section_main_banner_title,
        'page_id' => $request->id,
        'created_at' => Date::now()->toDateTimeString()
      ]);
    }

    return redirect()->back()->with('status', 'Success');
  }
}
