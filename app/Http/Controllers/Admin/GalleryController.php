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

        // Simpan gambar di dalam direktori public
        $destinationPath = 'public/photo';

        // Mendapatkan nama file asli
        $fileName = $request->file('photo')->getClientOriginalName();

        // Menggunakan storeAs() method untuk menyimpan gambar
        $request->file('photo')->storeAs($destinationPath, $fileName);

        // Membuat objek Gallery baru
        $gallery = new Gallery([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'photo' => $fileName, // Menyimpan nama file gambar
        ]);

        // Simpan objek Gallery
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5000', // max 2MB
        ]);

        // Mendapatkan objek Gallery berdasarkan ID
        $gallery = Gallery::findOrFail($id);

        // Mengupdate atribut Gallery
        $gallery->title = $request->title;
        $gallery->description = $request->description;

        // Upload foto baru jika disediakan
        if ($request->hasFile('photo')) {
            // Menghapus foto lama jika ada
            if ($gallery->photo) {
                Storage::delete('public/photo/' . $gallery->photo);
            }

            // Simpan foto baru
            $fileName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/photo', $fileName);
            $gallery->photo = $fileName;
        }

        // Simpan perubahan ke database
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus foto dari penyimpanan jika ada
        if ($gallery->photo) {
            Storage::delete('public/photo/' . $gallery->photo);
        }

        // Hapus gallery dari database
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
