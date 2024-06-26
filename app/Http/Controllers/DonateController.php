<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index()
    {
        return view('Donate.Donate');
    }

    public function store(Request $request)
    {
        // Validasi input berdasarkan tipe donasi
        $request->validate([
            'Name' => 'required|string',
            'Email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
            'Phone_number' => 'required|numeric|digits_between:9,15',
            'origin' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'category' => 'required|string|in:money,goods',
            'donation_amount' => 'nullable|numeric|required_if:category,money',
            'evidence_of_transfer' => 'nullable|file|required_if:category,money',
            'goods_name' => 'nullable|string|required_if:category,goods',
            'goods_quantity' => 'nullable|integer|required_if:category,goods',
            'Description' => 'required|string',
        ],[
            'origin.regex' => 'Kolom asal daerah hanya boleh berisi huruf dan spasi.',
            'Email.regex' => 'Format Email harus menggunakan domain @gmail.com.',
            'Phone_number.numeric' => 'Nomor telepon harus berupa angka.',
            'Phone_number.digits_between' => 'Nomor telepon harus antara 9 hingga 15 digit.',
        ]);

        // Simpan data donasi
        $donates = new Donate([
            'id_donate' => Donate::generateNextId(),
            'Name' => $request->get('Name'),
            'Email' => $request->get('Email'),
            'Phone_number' => $request->get('Phone_number'),
            'origin' => $request->get('origin'),
            'category' => $request->get('category'),
            'donation_amount' => $request->get('donation_amount'),
            'goods_name' => $request->get('goods_name'),
            'goods_quantity' => $request->get('goods_quantity'),
            'Description' => $request->get('Description'),
            'status' => 0,
        ]);

        // Upload bukti transfer jika ada
        if ($request->hasFile('evidence_of_transfer')) {
            $file = $request->file('evidence_of_transfer');
            $fileName = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/evidence_of_transfer';
            $file->move($destinationPath, $fileName);
            $donates->evidence_of_transfer = $fileName;
        }

        // Buat dan simpan data donasi
        $donates->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Terimakasih sudah memberikan donasi😁. Tuhan memberkati.');
    }
}

