<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
      $users = User::all();
      return view('pages.pengguna.index', compact('users'));
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
        'role' => 'required'
      ]);

      $user = User::create($request->all());
      if ($user) {
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
      }
    }

    public function show(Request $request, $id)
    {
      $user = User::find($id);

      if ($user) {
        // ajax response
        if ($request->ajax()) {
          return response()->json([
            'success' => true,
            'data' => $user
          ], 200);
        }
        // response web (future changes)

      } else {
        // ajax response
        if ($request->ajax()) {
          return response()->json([
            'success' => false,
            'message' => 'User not found.',
            'data' => null
          ], 204);
        }
      }
    }

    public function update(Request $request)
    {
      $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,'.$request->id,
        'password' => 'nullable|confirmed|min:8',
        'role' => 'required|'
      ]);

      $user = User::find($request->id)->update($request->all());
      if ($user) {
        if ($request->ajax()) {
          return response()->json([
            'success' => true,
            'data' => $user
          ], 201);
        } else {
          return redirect()->back()->with('success', 'Data berhasil disimpan.');
        }
      }
    }

    public function updateStatus(Request $request)
    {
      $user = User::find($request->id)->update(['status' => $request->status]);
      if ($user) {
        if ($request->ajax()) {
          return response()->json([
            'success' => true,
            'data' => $user
          ], 201);
        }
      }
    }
}
