<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipType;
use Illuminate\Http\Request;

class ScholarshipTypeController extends Controller
{
    public function index()
    {
      $types = ScholarshipType::all();
      return view('pages.jenis-beasiswa.index', compact('types'));
    }

    public function store(Request $request )
    {
      $request->validate([
        'name' => 'required',
        'sponsor' => 'required'
      ]);

      $type = ScholarshipType::create($request->all());
      if ($type) {
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
      }
    }

    public function update(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'sponsor' => 'required'
      ]);

      $type = ScholarshipType::find($request->id)->update($request->all());
      if ($type) {
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
      }
    }
}
