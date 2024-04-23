<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Store a newly created resource in storage.
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
    ]);

    $gallery = new Gallery();
    $gallery->title = $request->title;
    $gallery->description = $request->description;

    // Upload photo if provided
    if ($request->hasFile('photo')) {
        $imageName = $request->photo->getClientOriginalName(); // Menggunakan nama asli untuk nama file foto
        $destinationPath = 'public/galleries'; // Path yang diinginkan
        $request->photo->storeAs($destinationPath, $imageName);
        $gallery->photo = $imageName;
    }

    $gallery->save();

    return redirect()->route('admin.gallery.index')->with('success', 'Gallery created successfully.');
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        $gallery = Gallery::findOrFail($id);
        $gallery->title = $request->title;
        $gallery->description = $request->description;

        // Upload new photo if provided
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($gallery->photo) {
                Storage::delete('public/storage/app/public/galleries/' . $gallery->photo);
            }

            $imageName = $request->photo->getClientOriginalName(); // Menggunakan nama asli untuk nama file foto
            $destinationPath = 'public/storage/app/public/galleries/'; // Path yang diinginkan
            $request->photo->storeAs($destinationPath, $imageName);
            $gallery->photo = $imageName;
        }

        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        // Delete photo from storage if exists
        if ($gallery->photo) {
            Storage::delete('public/storage/app/public/galleries/' . $gallery->photo);
        }
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
