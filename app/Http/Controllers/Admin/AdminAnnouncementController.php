<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Announcement_category;
use Illuminate\Support\Facades\Storage;

class AdminAnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all(); // Mengambil semua pengumuman
        return view('Admin.Announcement.index', ['announcements' => $announcements]);
    }

    public function create()
    {
        // Menampilkan form untuk membuat pengumuman baru
        $categories = Announcement_category::all(); // Mengambil semua kategori
        return view('Admin.Announcement.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
            'location'=> 'required|string',
        ]);

        $announcements = new Announcement([
            'id_announcements' => Announcement::generateNextId(),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'location' => $request->get('location'),
        ]);

        $announcementCategory = Announcement_category::findOrFail($request->get('announcement_category_id'));
        $announcements->category()->associate($announcementCategory);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/photo';
            $file->move($destinationPath, $filename);
            $announcements->photo = $filename;
        }

        $announcements->save();
        return redirect()->route('Admin.Announcement.index')->with('success', 'Pengumuman berhasil disimpan!');
    }

    public function update(Request $request, Announcement $announcements)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
            'location'=> 'required|string',
            'announcement_category_id' => 'required|exists:announcement_categories,id_announcement_categories',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'tanggal' => $request->tanggal,
            'announcement_category_id' => $request->announcement_category_id,
        ];

        // Menghandle foto
        if ($request->hasFile('photo')) {
            // Menghapus foto lama jika ada
            if ($announcements->photo) {
                Storage::disk('public')->delete('photo/' . $announcements->photo);
            }

            // Menyimpan foto baru
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/photo';
            $file->move($destinationPath, $filename);
            $data['photo'] = $filename;
        }

        $announcements->update($data);

        return redirect()->route('Admin.Announcement.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function edit(Announcement $announcements)
    {
        $categories = Announcement_category::all(); // Mengambil semua kategori
        return view('Admin.Announcement.edit', compact('announcements', 'categories'));
    }

    public function destroy($id)
    {
        $announcements = Announcement::findOrFail($id);
        if (Storage::disk('public')->exists('photo/' . $announcements->photo)) {
            Storage::disk('public')->delete('photo/' . $announcements->photo);
        }
        $announcements->delete();

        return redirect()->route('Admin.Announcement.index')->with('success', 'Pengumuman berhasil dihapus');
    }
}
