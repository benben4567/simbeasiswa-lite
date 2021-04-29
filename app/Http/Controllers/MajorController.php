<?php

namespace App\Http\Controllers;

use App\Exports\MajorsExport;
use App\Models\Major;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MajorController extends Controller
{
    public function index()
    {
      $majors = Major::all();
      return view('pages.prodi.index', compact('majors'));
    }

    public function store(Request $request)
    {
      $request->validate([
        'degree' => 'required',
        'name' => 'required'
      ]);

      $major = Major::create($request->all());

      if ($major) {
        return redirect()->back()->with('success', 'Data berhasil disimpan');
      }
    }

    public function update(Request $request)
    {
      $request->validate([
        'degree' => 'required',
        'name' => 'required'
      ]);
      $major = Major::find($request->id)->update($request->all());
      if ($major) {
        return redirect()->back()->with('success', 'Data berhasil disimpan');
      }
    }

    public function export()
    {
      return Excel::download(new MajorsExport, 'format_upload.xlsx');
    }
}
