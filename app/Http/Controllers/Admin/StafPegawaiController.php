<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StafPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
            'jabatan' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $stafpegawai = new StafPegawai([
            'id_stafpegawai' => StafPegawai::generateNextId(),
            'nama' => $request->get('nama'),
            'umur' => $request->get('umur'),
            'tanggal_bergabung' => $request->get('tanggal_bergabung'),
            'jabatan' => $request->get('jabatan')
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/photo';
            $file->move($destinationPath, $filename);
            $stafpegawai->photo = $filename;
        }

        $stafpegawai->save();
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
        $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
            'jabatan' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $data = [
            'nama' => $request->nama,
            'umur' => $request->umur,
            'tanggal_bergabung' => $request->tanggal_bergabung,
            'jabatan' => $request->jabatan,
        ];

        if ($request->hasFile('photo')) {
            // Menghapus foto lama jika ada
            if ($stafpegawai->photo) {
                Storage::disk('public')->delete('photo/' . $stafpegawai->photo);
            }

            // Menyimpan foto baru
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/photo';
            $file->move($destinationPath, $filename);
            $data['photo'] = $filename;
        }

        $stafpegawai->update($data);
        return redirect()->route('admin.stafpegawai.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $stafpegawai = StafPegawai::findOrFail($id);

        // Hapus foto dari storage jika ada
        if (Storage::disk('public')->exists('photo/' . $stafpegawai->photo)) {
            Storage::disk('public')->delete('photo/' . $stafpegawai->photo);
        }

        $stafpegawai->delete();
        return redirect()->route('admin.stafpegawai.index')->with('success', 'Data berhasil dihapus.');
    }
}
