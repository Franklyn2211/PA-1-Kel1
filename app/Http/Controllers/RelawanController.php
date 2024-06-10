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
            'email' => 'required|email|unique:volunteers,email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', // Validasi email untuk @gmail.com
            'phone_number' => 'required|numeric|digits_between:9,15',
            'date_of_birth' => 'required|date',
            'origin' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'location' => 'required|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx',
        ],[
            'email.unique' => 'Anda sudah pernah mengisi form berikut. Tolong gunakan email yang lain.',
            'email.regex' => 'Format Email harus menggunakan domain @gmail.com.',
            'phone_number.numeric' => 'Nomor telepon harus berupa angka.',
            'phone_number.digits_between' => 'Nomor telepon harus antara 9 hingga 15 digit.',
            'origin.regex' => 'Kolom asal daerah hanya boleh berisi huruf dan spasi.',
            'cv.mimes' => 'CV harus berupa file dengan format: pdf, doc, atau docx.',
        ]);

        $existingRelawan = Relawan::where('email', $request->get('email'))->first();
        if ($existingRelawan) {
            return redirect()->back()->withErrors(['error' => 'Anda sudah pernah mengisi form berikut. Tolong gunakan email yang lain.']);
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
            'origin' => $request->get('origin'),
            'location' => $request->get('location'),
            'status' => 0,
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
