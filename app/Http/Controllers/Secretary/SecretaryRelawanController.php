<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Relawan;
use Illuminate\Http\Request;

class SecretaryRelawanController extends Controller
{
    // In your controller method
public function index()
{
    $relawan = Relawan::all(); // Assuming Volunteer is your model name
    return view('Secretary.relawan.relawan', compact('relawan'));
}



public function destroy($id)
{
    $relawan = Relawan::findOrFail($id);

    $relawan->delete();

    return back()->with('success', 'Relawan berhasil dihapus.');

}
}
