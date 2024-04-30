<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnakDisabilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnakDisabilitasController extends Controller
{

    public function index()
    {
        $anakdisabilitas = AnakDisabilitas::all();
        return view('admin.anakdisabilitas.index', compact('anakdisabilitas'));
    }

    public function create()
    {
        $anakdisabilitas = AnakDisabilitas::all();
        return view('admin.anakdisabilitas.create', compact('anakdisabilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
        ]);

        $anakdisabilitas = new AnakDisabilitas([
            'id_anakdisabilitas' => AnakDisabilitas::generateNextId(),
            'nama' => $request->get('nama'),
            'umur' => $request->get('umur'),
            'tanggal_bergabung' => $request->get('tanggal_bergabung'),
        ]);

        $anakdisabilitas->save();
        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Anak disabilitas berhasil ditambahkan.');
    }

    // Menampilkan detail anak disabilitas
    public function show(AnakDisabilitas $anakdisabilitas)
    {
        $anakdisabilitas = AnakDisabilitas::all();
        return view('admin.anakdisabilitas.show', compact('anakdisabilitas'));
    }

    public function edit(AnakDisabilitas $anakdisabilitas)
    {
        $anakdisabilitas = AnakDisabilitas::all();
        return view('admin.anakdisabilitas.edit', compact('anakdisabilitas'));
    }

    // Menyimpan perubahan saat inline editing dilakukan
    public function update(Request $request, AnakDisabilitas $anakdisabilitas)
    {
        $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
        ]);

        $data = [
            'nama' => $request->nama,
            'umur' => $request->umur,
            'tanggal_bergabung' => $request->tanggal_bergabung,
        ];

        $anakdisabilitas->update($data);
        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(AnakDisabilitas $anakdisabilitas)
    {
        $anakdisabilitas->delete();

        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Data berhasil dihapus.');
    }
}