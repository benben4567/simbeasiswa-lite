<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Scholarship;
use App\Models\ScholarshipType;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScholarshipController extends Controller
{
    public function index()
    {
      $types = ScholarshipType::select('id', 'name')->get();
      $scholarships = Scholarship::with('scholarshipType')->withCount('students')->get();
      return view('pages.beasiswa.index', compact('types', 'scholarships'));
    }

    public function show($id)
    {
      $scholarship = Scholarship::find($id);
      $students = Student::all();
      return view('pages.beasiswa.show', compact('scholarship', 'students'));
    }

    public function store(Request $request)
    {
      $request->validate([
        'period' => 'required',
        'nominal' => 'required|numeric',
      ]);

      $type = ScholarshipType::find($request->beasiswa);
      $scholarship = $type->scholarships()->create($request->except('beasiswa'));

      if ($scholarship) {
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
      }
    }

    public function uploadDocument(Request $request)
    {
      $request->validate([
        'file' => 'file|mimes:pdf|max:2048'
      ]);

      $filename = $request->file('file')->getClientOriginalName();
      // store to directory
      $path = $request->file('file')->storeAs('public/files', $filename);

      $scholarship = Scholarship::find($request->id);
      $scholarship->document = $filename;
      $scholarship->save();

      return response()->json([
        'success' => true
      ], 200);
    }

    public function assignStudent(Request $request)
    {
      $scholarship = Scholarship::find($request->id);
      try {
        $assign = $scholarship->students()->sync($request->data, false);
      } catch (\Throwable $th) {
        return response()->json([
          'success' => false,
          'message' => $th
        ], 500);
      }
      return response()->json([
        'success' => true,
        'data' => $assign
      ], 200);
    }

    public function deassignStudent(Request $request)
    {
      $scholarship = Scholarship::find($request->id);
      $deassign = $scholarship->students()->detach($request->data);
      if ($deassign) {
        return response()->json([
          'success' => true,
          'data' => $deassign
        ], 200);
      }
    }

    public function importStudent(Request $request)
    {
      $request->validate([
        'id' => 'required',
        'file' => 'required|file|mimes:xls,xlsx'
      ]);

      $import = new StudentsImport();
      $import->onlySheets('data');

      $array = Excel::toArray($import, $request->file('file'));
      $data = $array['data'];

      $ids = array();
      // create or update to Student Models
      foreach ($data as $dt) {
        $student =  Student::updateOrCreate(['nim' => $dt['nim']],[
          'major_id' => $dt['kdprodi'],
          'nama' => $dt['nama'],
          'no_hp' => $dt['no_hp'],
          ]);
        array_push($ids, $student->id);
      }

      // assign student to scholarship
      $scholarship = Scholarship::find($request->id);
      try {
        $assign = $scholarship->students()->sync($ids, false);
      } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Gagal menetapkan mahasiswa.');
      }

      return redirect()->back()->with('success', 'Berhasil import dan menetapkan mahasiswa.');
    }
}
