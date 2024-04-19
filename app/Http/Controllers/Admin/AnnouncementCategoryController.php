<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnnouncementCategoryController extends Controller
{
    public function index()
    {
        $newsCategories = Announcement_Category::all(); // Mengambil semua kategori berita
        return view('Admin.AnnouncementCategory.index', compact('newsCategories'));
    }
    
    public function create()
    {
        return view('admin.announcementCategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Generate slug
        $slug = Str::slug($request->name, '-');

        // Simpan data ke database
        $announcementCategory = new Announcement_category();
        $announcementCategory->name = $request->name;
        $announcementCategory->slug = $slug;
        $announcementCategory->description = $request->description;
        $announcementCategory->save();

        return redirect()->route('admin.announcementCategory.index')->with([
            'message' => 'Kategori Pengumuman baru berhasil ditambahkan!',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Announcement_category $announcementCategory)
    {
        return view('admin.announcementCategory.edit', compact('announcementCategory'));
    }

    public function update(Request $request, Announcement_category $announcementCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $slug = Str::slug($request->name, '-');
        $announcementCategory->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.announcementCategory.index')->with('success', 'Kategori Pengumuman berhasil diperbarui!');
    }

    public function destroy(Announcement_category $announcementCategory)
    {
        $announcementCategory->delete();

        return redirect()->route('admin.announcementCategory.index')->with([
            'message' => 'Kategori Pengumuman berhasil dihapus!',
            'alert-type' => 'success'
        ]);
    }
}
