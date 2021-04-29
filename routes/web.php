<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Beasiswa (Pembukaan)
Route::group(['middleware' => 'auth', 'prefix' => 'beasiswa', 'as' => 'beasiswa.'], function () {
  Route::get('/', [App\Http\Controllers\ScholarshipController::class, 'index'])->name('index');
  Route::get('/show/{id}', [App\Http\Controllers\ScholarshipController::class, 'show'])->name('show');
  Route::post('/', [App\Http\Controllers\ScholarshipController::class, 'store'])->name('store');
  Route::post('/show/upload-document', [App\Http\Controllers\ScholarshipController::class, 'uploadDocument'])->name('upload');
  Route::post('/assign-student', [App\Http\Controllers\ScholarshipController::class, 'assignStudent'])->name('assign');
  Route::post('/deassign-student', [App\Http\Controllers\ScholarshipController::class, 'deassignStudent'])->name('deassign');
  Route::post('/import-student', [App\Http\Controllers\ScholarshipController::class, 'importStudent'])->name('import-student');
});

// Jenis Beasiswa
Route::group(['middleware' => 'auth', 'prefix' => 'jenis-beasiswa', 'as' => 'jenis-beasiswa.'], function () {
  Route::get('/', [App\Http\Controllers\ScholarshipTypeController::class, 'index'])->name('index');
  Route::post('/', [App\Http\Controllers\ScholarshipTypeController::class, 'store'])->name('store');
  Route::put('/', [App\Http\Controllers\ScholarshipTypeController::class, 'update'])->name('update');
});

// Program Studi
Route::group(['middleware' => 'auth', 'prefix' => 'prodi', 'as' => 'prodi.'], function() {
  Route::get('/', [App\Http\Controllers\MajorController::class, 'index'])->name('index');
  Route::post('/', [App\Http\Controllers\MajorController::class, 'store'])->name('store');
  Route::put('/update', [App\Http\Controllers\MajorController::class, 'update'])->name('update');
});

// Mahasiswa
Route::group(['middleware' => 'auth', 'prefix' => 'mahasiswa', 'as' => 'mahasiswa.'], function() {
  Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('index');
  Route::post('/', [App\Http\Controllers\StudentController::class, 'store'])->name('store');
  Route::get('/show/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('show');
  Route::put('/update', [App\Http\Controllers\StudentController::class, 'update'])->name('update');
  Route::post('/import', [App\Http\Controllers\StudentController::class, 'import'])->name('import');
});

// Pelaporan
Route::group(['middleware' => 'auth', 'prefix' => 'rekapitulasi', 'as' => 'rekapitulasi.'], function() {
  Route::get('/', [App\Http\Controllers\ReportController::class, 'index'])->name('index');
});

// Pengguna
Route::group(['middleware' => ['auth', 'role:super-admin'], 'prefix' => 'pengguna', 'as' => 'pengguna.'], function() {
  Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
  Route::post('/', [App\Http\Controllers\UserController::class, 'store'])->name('store');
  Route::get('/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('show');
  Route::put('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
  Route::put('/status', [App\Http\Controllers\UserController::class, 'updateStatus'])->name('status');
});
