<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5000', // max 5MB
        ]);

        $galleries = new Gallery([
            'id_galleries' => Gallery::generateNextId(),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = public_path('storage/galeri');
            $file->move($destinationPath, $filename);
            $galleries->photo = $filename;
        }

        // Simpan objek Gallery
        $galleries->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil di tambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $galleries = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Gallery $galleries)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5000', // max 2MB
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        // Menghandle foto
        if ($request->hasFile('photo')) {
            // Menghapus foto lama jika ada
            if ($galleries->photo) {
                Storage::disk('public')->delete('galeri/' . $galleries->photo);
            }

            // Menyimpan foto baru
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = public_path('storage/galeri');
            $file->move($destinationPath, $filename);
            $data['photo'] = $filename;
        }

        $galleries->update($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $galleries = Gallery::findOrFail($id);

        // Hapus foto dari storage jika ada
        if (Storage::disk('public')->exists('galeri/' . $galleries->photo)) {
            Storage::disk('public')->delete('galeri/' . $galleries->photo);
        }

        // Hapus gallery dari database
        $galleries->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
