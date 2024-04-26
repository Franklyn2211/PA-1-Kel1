<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StafPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan baris ini untuk mengimpor kelas Auth

class StafPegawaiController extends Controller
{
    public function index()
    {
        $stafpegawai = StafPegawai::all();
        return view('admin.stafpegawai.index', compact('stafpegawai'));
    }

    public function create()
    {
        return view('admin.stafpegawai.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
            'jabatan' => 'required|string',
        ]);

        $validatedData['created_by'] = Auth::id(); // Menyimpan ID user yang membuat data
        $validatedData['updated_by'] = Auth::id(); // Menyimpan ID user yang terakhir mengubah data

        StafPegawai::create($validatedData);

        return redirect()->route('admin.stafpegawai.index')->with('success', 'Staf pegawai berhasil ditambahkan.');
    }

    public function show(StafPegawai $stafpegawai)
    {
        return view('admin.stafpegawai.show', compact('stafpegawai'));
    }

    public function edit(StafPegawai $stafpegawai)
    {
        return view('admin.stafpegawai.edit', compact('stafpegawai'));
    }

    public function update(Request $request, StafPegawai $stafpegawai)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
            'jabatan' => 'required|string',
        ]);

        $validatedData['updated_by'] = Auth::id(); // Menyimpan ID user yang terakhir mengubah data

        $stafpegawai->update($validatedData);

        return redirect()->route('admin.stafpegawai.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(StafPegawai $stafpegawai)
    {
        $stafpegawai->delete();

        return redirect()->route('admin.stafpegawai.index')->with('success', 'Data berhasil dihapus.');
    }
}
