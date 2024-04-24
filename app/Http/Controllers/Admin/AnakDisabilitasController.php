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
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
        ]);

        $validatedData['created_by'] = auth()->id(); // Menyimpan ID user yang membuat data
        $validatedData['updated_by'] = auth()->id(); // Menyimpan ID user yang terakhir mengubah data

        AnakDisabilitas::create($validatedData);

        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Anak disabilitas berhasil ditambahkan.');
    }

    public function show(AnakDisabilitas $anakdisabilitas)
    {
        return view('admin.anakdisabilitas.show', compact('anakdisabilitas'));
    }

    public function edit(AnakDisabilitas $anakdisabilitas)
    {
        return view('admin.anakdisabilitas.edit', compact('anakdisabilitas'));
    }

    public function update(Request $request, AnakDisabilitas $anakdisabilitas)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
        ]);

        $validatedData['updated_by'] = auth()->id(); // Update ID user yang terakhir mengubah data

        $anakdisabilitas->update($validatedData);

        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(AnakDisabilitas $anakdisabilitas)
    {
        $anakdisabilitas->delete();

        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Data berhasil dihapus.');
    }
}
