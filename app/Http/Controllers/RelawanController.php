<?php

namespace App\Http\Controllers;

use App\Models\Volunteer; // Update namespace to use Volunteer model
use Illuminate\Http\Request;

class RelawanController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::all(); // Update variable name
        return view('Volunteer.Volunteer', compact('volunteers')); // Update compact variable name
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:volunteers,email', // Update table name in validation rules
            'phone_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'location' => 'required|string',
            'cv' => 'nullable|file',
        ]);

        // Generate ID untuk relawan
        $nextId = Volunteer::generateNextId();

        // Simpan data relawan ke dalam database
        $Volunteers = new Volunteer([
            'id_volunteers' => $nextId,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'date_of_birth' => $request->get('date_of_birth'),
            'location' => $request->get('location'),
        ]);


        // Jika ada file CV yang diunggah, simpan ke dalam storage
        if ($request->hasFile('cv')) {
            $file = $request -> file('cv');
            $namaFile = $file ->getClientOriginalName();
            $destinationPath = 'storage/app/public/CV';
            $file -> move($destinationPath,$namaFile);
            $Volunteers-> cv = $namaFile;
        }

        // Simpan data relawan
        $Volunteers->save();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Relawan berhasil ditambahkan.');
    }

}









