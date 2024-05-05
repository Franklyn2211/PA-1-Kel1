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
        return view('admin.anakdisabilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'date_joined' => 'required|date',
        ]);

        $anakdisabilitas = new AnakDisabilitas([
            'id_child_with_disabilities' => AnakDisabilitas::generateNextId(),
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'date_joined' => $request->get('date_joined'),
        ]);

        $anakdisabilitas->save();
        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Anak disabilitas berhasil ditambahkan.');
    }

    // Menampilkan detail anak disabilitas
    public function show($id)
    {
        $anakdisabilitas = AnakDisabilitas::findOrFail($id);
        return view('admin.anakdisabilitas.show', compact('anakdisabilitas'));
    }

    public function edit($id)
    {
        $anakdisabilitas = AnakDisabilitas::all();
        return view('admin.anakdisabilitas.edit', compact('anakdisabilitas'));
    }

    // Menyimpan perubahan saat inline editing dilakukan
    public function update(Request $request, AnakDisabilitas $anakdisabilitas)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'date_joined' => 'required|date',
        ]);

<<<<<<< HEAD
        $anakdisabilitas->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'tanggal_bergabung' => $request->tanggal_bergabung,
        ]);
=======
        $data = [
            'name' => $request->name,
            'age' => $request->age,
            'date_joined' => $request->date_joined,
        ];
>>>>>>> 336e8d942531d4d6b01c3b480285e410f39748e8

        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anakdisabilitas = AnakDisabilitas::findOrFail($id); 
        $anakdisabilitas->delete();

        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Data berhasil dihapus.');
    }
}
