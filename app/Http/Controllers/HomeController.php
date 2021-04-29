<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Models\ScholarshipType;
use App\Models\ScholarshipStudent;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $type = ScholarshipType::count();
        $student = ScholarshipStudent::count();
        $major = Major::count();
        $user = User::count();
        return view('home', compact('type','student','major','user'));
    }
}
