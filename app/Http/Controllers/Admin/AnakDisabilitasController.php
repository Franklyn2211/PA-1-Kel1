<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\anakdisabilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class anakdisabilitasController extends Controller
{
    public function index()
    {
        $anakdisabilitas = AnakDisabilitas::all();
        $ageGroups = $this->countAgeGroups($anakdisabilitas);
        return view('admin.anakdisabilitas.index', compact('anakdisabilitas', 'ageGroups'));
    }

    public function create()
    {
        return view('admin.anakdisabilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'date_of_birth' => 'required|date',
            'date_joined' => 'required|date',
        ]);

        $anakdisabilitas = new anakdisabilitas([
            'id_child_with_disabilities' => anakdisabilitas::generateNextId(),
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'date_of_birth' => $request->get('date_of_birth'),
            'date_joined' => $request->get('date_joined'),
        ]);

        $anakdisabilitas->save();
        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Anak disabilitas berhasil ditambahkan.');
    }

    public function show($id)
    {
        $anakdisabilitas = anakdisabilitas::findOrFail($id);
        return view('admin.anakdisabilitas.show', compact('anakdisabilitas'));
    }

    public function edit(anakdisabilitas $anakdisabilitas)
    {
        return view('admin.anakdisabilitas.edit', compact('anakdisabilitas'));
    }

    public function update(Request $request, anakdisabilitas $anakdisabilitas)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'date_of_birth' => 'required|date',
            'date_joined' => 'required|date',
        ]);

        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'date_joined' => $request->date_joined,
        ];

        $anakdisabilitas->update($data);
        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {

        $anakdisabilitas = AnakDisabilitas::findOrFail($id);
        $anakdisabilitas->delete();

        return redirect()->route('admin.anakdisabilitas.index')->with('success', 'Data berhasil dihapus.');
    }

    // Fungsi untuk menghitung umur
    private function countAgeGroups($anakdisabilitas)
    {
        $ageGroups = [
            '0-5' => 0,
            '6-10' => 0,
            '11-15' => 0,
            // Tambahkan kategori umur lainnya sesuai kebutuhan
        ];

        foreach ($anakdisabilitas as $anak) {
            $age = Carbon::parse($anak->date_of_birth)->age;
            if ($age >= 0 && $age <= 5) {
                $ageGroups['0-5']++;
            } elseif ($age >= 6 && $age <= 10) {
                $ageGroups['6-10']++;
            } elseif ($age >= 11 && $age <= 15) {
                $ageGroups['11-15']++;
            }
            // Tambahkan kondisi untuk kategori umur lainnya sesuai kebutuhan
        }

        return $ageGroups;
    }
}
