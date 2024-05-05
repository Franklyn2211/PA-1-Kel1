<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.contact', compact('contacts'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'message' => 'required|string',
        ]);

        // Generate ID untuk kontak
        $nextId = Contact::generateNextId();

        // Pastikan ID yang dihasilkan belum digunakan
        while (Contact::find($nextId)) {
            $nextId = Contact::generateNextId();
        }

        // Simpan data kontak ke dalam database
        $contact = new Contact([
            'id_contact' => $nextId,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'message' => $request->input('message'),
        ]);

        // Simpan data kontak
        $contact->save();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }
}
