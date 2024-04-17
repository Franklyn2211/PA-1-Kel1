<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        $donates = Donate::all();
        return view('Admin.donatur.donatur', compact('donates'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'Name' => 'required|string',
            'Email' => 'required|email|unique:donates,Email',
            'Phone_number' => 'required|string',
            'donation_amount' => 'required|numeric',
            'evidence_of_transfer' => 'nullable|file',
            'Description' => 'required|string',
        ]);

        // Simpan data donasi
        $donates = new Donate([
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
            $donates->evidence_of_transfer = $fileName;
        }

        // Simpan data donasi
        $donates->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Donasi berhasil dikirim.');
    }

    public function destroy($id)
    {
        // Temukan data relawan yang akan dihapus
        $donate = Donate::findOrFail($id);

        // Hapus data relawan
        $donate->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return back()->with('success', 'Donatur berhasil dihapus.');

    }
}
