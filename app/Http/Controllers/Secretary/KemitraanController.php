<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Kemitraan;
use Illuminate\Http\Request;

class KemitraanController extends Controller
{
    public function index()
    {
        $kemitraan = Kemitraan::all();

        return view('Secretary.kemitraan.index', compact('kemitraan'));
    }

    public function create()
    {
        return view('Secretary.kemitraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'program' => 'required|string',
        ]);

        $kemitraan = new Kemitraan([
            'id_partnership' => Kemitraan::generateNextId(),
            'name' => $request->get('name'),
            'program' => $request->get('program'),
        ]);
        if($request->hasFile('logo')){
            $request->file('logo')->move('logokemitraan/', $request->file('logo')->getClientOriginalName());
            $kemitraan->logo = $request->file('logo')->getClientOriginalName();

        }
        $kemitraan->save();
        return redirect()->route('Sekretaris.kemitraan.index')
            ->with('success', 'Kemitraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kemitraan = Kemitraan::findOrFail($id);
        return view('Secretary.kemitraan.edit', compact('kemitraan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'program' => 'required',
        ]);

        $kemitraan = Kemitraan::findOrFail($id);

        if($request->hasFile('logo')){
            $request->file('logo')->move('logokemitraan/', $request->file('logo')->getClientOriginalName());
            $kemitraan->logo = $request->file('logo')->getClientOriginalName();
            $kemitraan->save();
        }

        // Update name dan program
        $kemitraan->name = $request->get('name');
        $kemitraan->program = $request->get('program');

        $kemitraan->save();

        return redirect()->route('Secretary.kemitraan.index')->with('success', 'Kemitraan berhasil diperbarui.');
    }

    public function destroy(Kemitraan $kemitraan)
    {
        $kemitraan->delete();

        return redirect()->route('Secretary.kemitraan.index')
            ->with('success', 'Kemitraan berhasil dihapus.');
    }
}
