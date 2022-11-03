<?php

namespace App\Http\Controllers;

use App\Models\Pages;

class PagesController extends Controller
{
  function index () {
    return Pages::all()->toArray();
  }

  function getById ($id) {
    return Pages::where('id', $id)->first()->toArray();
  }

  function update ($request) {
    $request->validate([
      'title' => 'required',
      'description' => 'required'
    ]);

    Pages::where('id', $request->id)->update([
      'title' => $request->title,
      'description' => $request->description
    ]);

    return redirect()->back()->with('status', 'Success');
  }
}
