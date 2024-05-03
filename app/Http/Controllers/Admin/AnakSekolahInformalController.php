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
        return view('admin.anaksekolahinformal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'date_joined' => 'required|date',
        ]);

        $anaksekolahinformal = new AnakSekolahInformal([
            'id_informal_school_child' => AnakSekolahInformal::generateNextId(),
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'date_joined' => $request->get('date_joined'),
        ]);

        $anaksekolahinformal->save();
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
            'name' => 'required|string',
            'age' => 'required|integer',
            'date_joined' => 'required|date',
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
