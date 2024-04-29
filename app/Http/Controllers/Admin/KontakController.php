<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{

    public function index()
    {
        $kontak = Kontak::all();

        return view('admin.kontak.index', compact('kontak'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir kontak
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        // Simpan data relawan ke dalam database
        Kontak::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Kontak berhasil ditambahkan.');
    }


    public function destroy($id)
{
    // Menghapus data kontak dari database
    $kontak = Kontak::findOrFail($id);
    $kontak->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('admin.kontak.index')->with('success', 'Contact deleted successfully!');
}

}
