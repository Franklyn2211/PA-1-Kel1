<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{

    public function index()
    {
        $kontak = Kontak::all();

        return view('Contact.Contact', compact('kontak'));
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
       $kontak = new Kontak([
           'nama' => $request->get('nama'),  
           'email' => $request->get('email'),  
           'phone' => $request->get('phone'),  
           'message' => $request->get('message'),  
       ]);

    // Simpan data kontak
    $kontak->save();

    // Redirect kembali ke halaman sebelumnya dengan pesan sukses
    return redirect()->back()->with('success', 'Kontak berhasil ditambahkan.');
}

}
