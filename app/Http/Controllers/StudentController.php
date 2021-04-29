<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class StudentController extends Controller
{
    public function index()
    {
      $majors = Major::all();
      $students = Student::all();
      return view('pages.mahasiswa.index', compact('majors', 'students'));
    }

    public function store(Request $request)
    {
      $request->validate([
        'nama' => 'required',
        'nim' => 'required|unique:students,nim',
        'prodi' => 'required',
      ]);

      $major = Major::find($request->prodi);
      $student = $major->students()->create($request->except('prodi'));
      if ($student) {
        return redirect()->back()->with('success', 'Data berhasil disimpan');
      }
    }

    public function update(Request $request)
    {
      $request->validate([
        'nama' => 'required',
        'nim' => 'required|unique:students,nim,'.$request->id,
        'prodi' => 'required',
        'no_hp' => 'nullable|numeric|digits_between:11,13',
      ]);

      $request->merge(['major_id' => $request->prodi]);
      $student = Student::find($request->id)->update($request->all());
      if ($student) {
        return redirect()->back()->with('success', 'Data berhasil disimpan');
      }
    }

    public function show($id)
    {
      $majors = Major::all();
      $student = Student::find($id);
      return view('pages.mahasiswa.show', compact('majors','student'));
    }

    public function import(Request $request)
    {
      $request->validate([
        'file' => 'file|mimes:xls,xlsx'
      ]);

      $import = new StudentsImport();
      $import->onlySheets('data');

      $excel = Excel::import($import, request()->file('file'));
      return redirect()->back()->with('success', 'Import data mahasiswa berhasil');
    }
}
