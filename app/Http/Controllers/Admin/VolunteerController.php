<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::all();
        return view('admin.volunteer.index', compact('volunteers'));
    }

    public function create()
    {
        return view('admin.volunteer.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:volunteer,email',
            'jumlah_donasi' => 'required|integer',
            'gender' => 'required|string',
        ]);

        $validatedData['created_by'] = auth()->id(); // Menyimpan ID user yang membuat data
        $validatedData['updated_by'] = auth()->id(); // Menyimpan ID user yang terakhir mengubah data

        Volunteer::create($validatedData);

        return redirect()->route('admin.volunteer.index')->with('success', 'Volunteer berhasil ditambahkan.');
    }

    public function show(Volunteer $volunteer)
    {
        return view('admin.volunteer.show', compact('volunteer'));
    }

    public function edit(Volunteer $volunteer)
    {
        return view('admin.volunteer.edit', compact('volunteer'));
    }

    public function update(Request $request, Volunteer $volunteer)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:volunteer,email,' . $volunteer->id,
            'jumlah_donasi' => 'required|integer',
            'gender' => 'required|string',
        ]);

        $validatedData['updated_by'] = auth()->id(); // Menyimpan ID user yang terakhir mengubah data

        $volunteer->update($validatedData);

        return redirect()->route('admin.volunteer.index')->with('success', 'Data volunteer berhasil diperbarui.');
    }

    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();

        return redirect()->route('admin.volunteer.index')->with('success', 'Data volunteer berhasil dihapus.');
    }
}

