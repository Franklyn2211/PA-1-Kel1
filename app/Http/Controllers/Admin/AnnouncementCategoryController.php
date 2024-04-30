<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement_category;
use Illuminate\Http\Request;

class AnnouncementCategoryController extends Controller
{
    public function index()
    {
        $announcementCategories = Announcement_Category::all(); // Mengambil semua kategori berita
        return view('Admin.AnnouncementCategory.index', compact('announcementCategories'));
    }

    public function create()
    {
        return view('Admin.AnnouncementCategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $announcementCategories = new Announcement_category([
            'id_announcement_categories' => Announcement_category::generateNextId(),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        $announcementCategories->save();

        return redirect()->route('Admin.AnnouncementCategory.index')->with('success', 'Kategori Pengumuman berhasil ditambahkan!');
    }

    public function edit(Announcement_category $announcementCategory)
    {
        return view('Admin.AnnouncementCategory.edit', compact('announcementCategory'));
    }

    public function update(Request $request, Announcement_category $announcementCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $announcementCategory->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('Admin.AnnouncementCategory.index')->with('success', 'Kategori Pengumuman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $announcementCategory = Announcement_category::findOrFail($id);
        $announcementCategory->delete();

        return redirect()->route('Admin.AnnouncementCategory.index')->with('success', 'Kategori Pengumuman berhasil dihapus!');
    }
}
