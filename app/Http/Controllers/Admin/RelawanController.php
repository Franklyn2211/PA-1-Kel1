<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Relawan;
use Illuminate\Http\Request;

class RelawanController extends Controller
{
    public function index()
    {
        $relawans = Relawan::all();
        return view('Admin.relawan.relawan', compact('relawans'));
    }


    public function destroy($id)
    {
        // Temukan data relawan yang akan dihapus
        $relawan = Relawan::findOrFail($id);

        // Hapus data relawan
        $relawan->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.relawan')->with('success', 'Relawan berhasil dihapus.');

    }
}
