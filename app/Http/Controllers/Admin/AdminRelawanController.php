<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class AdminRelawanController extends Controller
{
    // In your controller method
public function index()
{
    $volunteers = Volunteer::all(); // Assuming Volunteer is your model name
    return view('Admin.relawan.relawan', compact('volunteers'));
}



public function destroy($id)
{
    $volunteers = volunteer::findOrFail($id);

    $volunteers->delete();

    return back()->with('success', 'Donatur berhasil dihapus.');

}
}
