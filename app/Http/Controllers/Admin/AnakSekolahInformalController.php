<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\anaksekolahinformal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class anaksekolahinformalController extends Controller
{
    public function index()
    {
        $anaksekolahinformal = anaksekolahinformal::all();
        $ageGroups = $this->countAgeGroups($anaksekolahinformal);
        return view('admin.anaksekolahinformal.index', compact('anaksekolahinformal', 'ageGroups'));
    }

    public function create()
    {
        return view('admin.anaksekolahinformal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'date_of_birth' => 'required|date',
            'date_joined' => 'required|date',
        ]);

        $anaksekolahinformal = new anaksekolahinformal([
            'id_informal_school_child' => anaksekolahinformal::generateNextId(),
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'date_of_birth' => $request->get('date_of_birth'),
            'date_joined' => $request->get('date_joined'),
        ]);

        $anaksekolahinformal->save();
        return redirect()->route('admin.anaksekolahinformal.index')->with('success', 'Anak disabilitas berhasil ditambahkan.');
    }
    public function show($id)
    {
        $anaksekolahinformal = anaksekolahinformal::findOrFail($id);
        return view('admin.anaksekolahinformal.show', compact('anaksekolahinformal'));
    }


    public function edit(anaksekolahinformal $anaksekolahinformal)
    {
        return view('admin.anaksekolahinformal.edit', compact('anaksekolahinformal'));
    }

    public function update(Request $request, anaksekolahinformal $anaksekolahinformal)
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

        $anaksekolahinformal->update($data);
        return redirect()->route('admin.anaksekolahinformal.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(anaksekolahinformal $anaksekolahinformal)
    {
        $anaksekolahinformal->delete();

        return redirect()->route('admin.anaksekolahinformal.index')->with('success', 'Data berhasil dihapus.');
    }

    // Fungsi untuk menghitung umur
    private function countAgeGroups($anaksekolahinformal)
    {
        $ageGroups = [
            '0-5' => 0,
            '6-10' => 0,
            '11-15' => 0,
            // Tambahkan kategori umur lainnya sesuai kebutuhan
        ];

        foreach ($anaksekolahinformal as $anak) {
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
