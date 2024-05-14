<?php

namespace App\Http\Controllers;

use App\Models\Relawan;
use Illuminate\Http\Request;

class RelawanController extends Controller
{
    public function index()
    {
        return view('Relawan.Relawan');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:volunteers,email', // Update table name in validation rules
            'phone_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'asaldaerah' => 'required|string',
            'location' => 'required|string',
            'cv' => 'nullable|file',
        ],[
            'email.unique' => 'Anda sudah pernah mengisi form berikut. Tolong gunakan email yang lain.',
        ]);

        $existingRelawan = Relawan::where('email', $request->get('email'))->first();
        if ($existingRelawan) {
            return redirect()->back()->withErrors(['error']);
        }
        // Generate ID untuk relawan
        $nextId = Relawan::generateNextId();

        // Simpan data relawan ke dalam database
        $relawan = new Relawan([
            'id_volunteers' => $nextId,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'date_of_birth' => $request->get('date_of_birth'),
            'asaldaerah' => $request->get('asaldaerah'),
            'location' => $request->get('location'),
        ]);


        // Jika ada file CV yang diunggah, simpan ke dalam storage
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $namaFile = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/CV';
            $file->move($destinationPath, $namaFile);
            $relawan->cv = $namaFile;
        }

        // Simpan data relawan
        $relawan->save();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Terimakasih sudah mengisi form, YPA Rumah Damai akan menginformasikan ke email anda jika anda di terima.');
    }

}
