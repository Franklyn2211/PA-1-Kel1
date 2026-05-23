<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Secretary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminSekretarisController extends Controller
{
    public function index()
    {
        $secretaries = Secretary::get();
        return view('Admin.sekretaris.index', compact('secretaries'));
    }

    public function create()
    {
        return view('Admin.sekretaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:secretaries',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Secretary::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('Admin.sekretaris.index')->with('success', 'Sekretaris berhasil ditambahkan');
    }

    public function edit($id)
    {
        $secretary = Secretary::findOrFail($id);
        return view('Admin.sekretaris.edit', compact('secretary'));
    }

    public function update(Request $request, $id)
    {
        $secretary = Secretary::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:secretaries,email,' . $secretary->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $secretary->name = $request->name;
        $secretary->email = $request->email;

        if ($request->filled('password')) {
            $secretary->password = Hash::make($request->password);
        }

        $secretary->save();

        return redirect()->route('Admin.sekretaris.index')->with('success', 'Sekretaris berhasil diperbarui');
    }

    public function destroy($id)
    {
        $secretary = Secretary::findOrFail($id);
        $secretary->delete();
        return redirect()->route('Admin.sekretaris.index')->with('success', 'Sekretaris berhasil dihapus');
    }
}