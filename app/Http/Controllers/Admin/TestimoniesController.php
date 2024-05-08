<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniesController extends Controller
{
    public function index(){
        $testimoni = Testimoni::all();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    public function create(){
        return view ('admin.testimoni.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'description' => 'required|string',
            'gender' => 'required|in:Laki-Laki,Perempuan',
        ]);

        $testimoni = new Testimoni([
            'id_testimonies' => Testimoni::generateNextId(),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'gender' => $request->get('gender'),
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/photo';
            $file->move($destinationPath, $filename);
            $testimoni->photo = $filename;
        }

        $testimoni->save();
        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil di tambah');
    }

    public function update(Request $request, Testimoni $testimoni){
        $request->validate([
            'name' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'description' => 'required|string',
            'gender' => 'required|in:Laki-Laki,Perempuan',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'gender' => $request->gender,
        ];

        if ($request->hasFile('photo')) {
            // Menghapus foto lama jika ada
            if ($testimoni->photo) {
                Storage::disk('public')->delete('photo/' . $testimoni->photo);
            }

            // Menyimpan foto baru
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/photo';
            $file->move($destinationPath, $filename);
            $data['photo'] = $filename;
        }

        $testimoni->update($data);
        return redirect()->route('admin.testimoni.index')->with('success', 'Data berhasil diperbarui');
    }
    public function edit(Testimoni $testimoni){
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function destroy($id){
        $testimoni = Testimoni::findOrFail($id);

        // Hapus foto dari storage jika ada
        if (Storage::disk('public')->exists('photo/' . $testimoni->photo)) {
            Storage::disk('public')->delete('photo/' . $testimoni->photo);
        }

        $testimoni->delete();
        return redirect()->route('admin.testimoni.index')->with('success', 'Data berhasil dihapus.');
    }
}
