<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kemitraan;
use Illuminate\Http\Request;

class KemitraanController extends Controller
{
    public function index()
    {
        $kemitraan = Kemitraan::all();

        return view('admin.kemitraan.index', compact('kemitraan'));
    }

    public function create()
    {
        return view('admin.kemitraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'program' => 'required|string',
        ]);

        $kemitraan = new Kemitraan([
            'id_kemitraan' => Kemitraan::generateNextId(),
            'nama' => $request->get('nama'),
            'program' => $request->get('program'),
        ]);
        if($request->hasFile('logo')){
            $request->file('logo')->move('logokemitraan/', $request->file('logo')->getClientOriginalName());
            $kemitraan->logo = $request->file('logo')->getClientOriginalName();
            
        }
        $kemitraan->save();
        return redirect()->route('admin.kemitraan.index')
            ->with('success', 'Kemitraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kemitraan = Kemitraan::findOrFail($id);
        return view('admin.kemitraan.edit', compact('kemitraan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'program' => 'required',
        ]);

        $kemitraan = Kemitraan::findOrFail($id);

        if($request->hasFile('logo')){
            $request->file('logo')->move('logokemitraan/', $request->file('logo')->getClientOriginalName());
            $kemitraan->logo = $request->file('logo')->getClientOriginalName();
            $kemitraan->save();
        }

        // Update nama dan program
        $kemitraan->nama = $request->get('nama');
        $kemitraan->program = $request->get('program');

        $kemitraan->save();

        return redirect()->route('admin.kemitraan.index')->with('success', 'Kemitraan berhasil diperbarui.');
    }

    public function destroy(Kemitraan $kemitraan)
    {
        $kemitraan->delete();

        return redirect()->route('admin.kemitraan.index')
            ->with('success', 'Kemitraan berhasil dihapus.');
    }
}
