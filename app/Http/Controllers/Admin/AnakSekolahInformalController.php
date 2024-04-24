<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnakSekolahInformal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnakSekolahInformalController extends Controller
{

    public function index()
    {
        $anaksekolahinformal = AnakSekolahInformal::all();
        return view('admin.anaksekolahinformal.index', compact('anaksekolahinformal'));
    }

    public function create()
    {
        $anaksekolahinformal = AnakSekolahInformal::all();
        return view('admin.anaksekolahinformal.create', compact('anaksekolahinformal'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
        ]);

        $validatedData['created_by'] = auth()->id(); // Menyimpan ID user yang membuat data
        $validatedData['updated_by'] = auth()->id(); // Menyimpan ID user yang terakhir mengubah data

        AnakSekolahInformal::create($validatedData);

        return redirect()->route('admin.anaksekolahinformal.index')->with('success', 'Anak sekolah informal berhasil ditambahkan.');
    }

    // Menampilkan detail anak disabilitas
    public function show(AnakSekolahInformal $anaksekolahinformal)
    {
        return view('admin.anaksekolahinformal.show', compact('anaksekolahinformal'));
    }

    public function edit(AnakSekolahInformal $anaksekolahinformal)
    {
        return view('admin.anaksekolahinformal.edit', compact('anaksekolahinformal'));
    }

    // Menyimpan perubahan saat inline editing dilakukan
    public function update(Request $request, AnakSekolahInformal $anaksekolahinformal)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
        ]);

        $anaksekolahinformal->update($validatedData);

        return redirect()->route('admin.anaksekolahinformal.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(AnakSekolahInformal $anaksekolahinformal)
    {
        $anaksekolahinformal->delete();

        return redirect()->route('admin.anaksekolahinformal.index')->with('success', 'Data berhasil dihapus.');
    }
}
