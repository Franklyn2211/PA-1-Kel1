<?php

namespace App\Http\Controllers;
use App\Models\Relawan;
use Illuminate\Http\Request;

class RelawanController extends Controller
{
    public function index()
    {
        $relawan = Relawan::all();
        return view('Relawan.Relawan', compact('relawan'));
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

        // Generate ID untuk relawan
        $nextId = Relawan::generateNextId();

        // Simpan data relawan ke dalam database
        $relawan = new Relawan([
            'id_relawan' => $nextId,  
            'nama_relawan' => $request->get('nama_relawan'),  
            'email' => $request->get('email'),  
            'no_hp' => $request->get('no_hp'),  
            'tanggallahir' => $request->get('tanggallahir'),  
            'lokasi' => $request->get('lokasi'), 
        ]);

        // Jika ada file CV yang diunggah, simpan ke dalam storage
        if ($request->hasFile('cv')) {
            $file = $request -> file('cv');
            $namaFile = $file ->getClientOriginalName();
            $destinationPath = 'storage/app/public/CV';
            $file -> move($destinationPath,$namaFile);
            $relawan-> cv = $namaFile;
        }

        // Simpan data relawan
        $relawan->save();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Relawan berhasil ditambahkan.');
    }

}
