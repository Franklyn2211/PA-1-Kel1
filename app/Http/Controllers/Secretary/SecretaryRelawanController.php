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


public function updateStatus($id)
    {
        $relawan = Relawan::findOrFail($id);

        // Toggle status: if 1, set to 0, and if 0, set to 1
        $relawan->status = $relawan->status == 1 ? 0 : 1;
        $relawan->save();

        return back()->with('success', 'Status relawan berhasil diperbarui.');
    }

public function destroy($id)
{
    $relawan = Relawan::findOrFail($id);

    $relawan->delete();

    return back()->with('success', 'Relawan berhasil dihapus.');

}
}
