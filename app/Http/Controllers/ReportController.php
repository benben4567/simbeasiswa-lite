<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\ScholarshipType;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
      $majors = Major::all();
      $types = ScholarshipType::all();
      return view('pages.pelaporan.index', compact('majors', 'types'));
    }
}
