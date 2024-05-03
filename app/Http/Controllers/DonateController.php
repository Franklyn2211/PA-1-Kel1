<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index()
    {
        $donate = Donate::all();
        return view('Donate.Donate', compact('donate'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'Name' => 'required|string',
            'Email' => 'required|email|unique:donates,Email',
            'Phone_number' => 'required|numeric',
            'donation_amount' => 'required|numeric',
            'evidence_of_transfer' => 'nullable|file',
            'Description' => 'required|string',
        ]);

        // Simpan data donasi
        $donate = new Donate([
            'id_donate' => Donate::generateNextId(),
            'Name' => $request->get('Name'),
            'Email' => $request->get('Email'),
            'Phone_number' => $request->get('Phone_number'),
            'donation_amount' => $request->get('donation_amount'),
            'Description' => $request->get('Description'),
        ]);


        // Upload bukti transfer jika ada
        if ($request->hasFile('evidence_of_transfer')) {
            $file = $request->file('evidence_of_transfer');
            $fileName = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/evidence_of_transfer';
            $file->move($destinationPath, $fileName);
            $donate->evidence_of_transfer = $fileName;
        }

        // Simpan data donasi
        $donate->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Donasi berhasil dikirim.');
    }

}
