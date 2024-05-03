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
            'name' => 'required|string',
            'age' => 'required|integer',
            'date_joined' => 'required|date',
            'job_title' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $stafpegawai = new StafPegawai([
            'id_staff' => StafPegawai::generateNextId(),
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'date_joined' => $request->get('date_joined'),
            'job_title' => $request->get('job_title')
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
            'name' => 'required|string',
            'age' => 'required|integer',
            'date_joined' => 'required|date',
            'job_title' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $data = [
            'name' => $request->name,
            'age' => $request->age,
            'date_joined' => $request->date_joined,
            'job_title' => $request->job_title,
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
