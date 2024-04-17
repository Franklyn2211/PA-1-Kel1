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

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_relawan' => 'required|string',
            'email' => 'required|email|unique:relawan,email',
            'no_hp' => 'required|string',
            'tanggallahir' => 'required|date',
            'lokasi' => 'required|string',
            'cv' => 'nullable|file',
        ]);

        // Simpan data relawan ke dalam database
        $relawan = new Relawan([
            'nama_relawan' => $request->input('nama_relawan'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'tanggallahir' => $request->input('tanggallahir'),
            'lokasi' => $request->input('lokasi'),
        ]);

        // Jika ada file CV yang diunggah, simpan ke dalam storage
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv_files', 'public');
            $relawan->cv = $cvPath;
        }

        // Simpan data relawan
        $relawan->save();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.relawan')->with('success', 'Relawan berhasil dihapus.');
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
