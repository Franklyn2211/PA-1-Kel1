<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Announcement_Category; // Menggunakan model AnnouncementCategory
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Import Str untuk membuat slug
use Illuminate\Support\Facades\Log;
Use App\Http\Controllers\Admin\Storage;
use App\Models\News;


class AdminNewsController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all(); // Mengambil semua pengumuman
        return view('Admin.Announcement.index', ['announcements' => $announcements]);
    }

    public function create()
    {
        // Menampilkan form untuk membuat pengumuman baru
        $categories = Announcement_Category::all(); // Mengambil semua kategori
        return view('admin.announcement.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'news_categories_id' => 'required|integer',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan aturan validasi dengan kebutuhan Anda
        ]);
    
        try {
            $news = new News();
    
            $news->title = $request->title;
            $news->description = $request->description;
            $news->news_categories_id = $request->news_categories_id;
    
            // Buat slug dari judul (misalnya)
            $news->slug = Str::slug($request->title); 
    
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $fileName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('uploads'), $fileName);
                $news->photo = $fileName;
            }
    
            $news->save();
    
            return redirect()->route('admin.news.index')->with('success', 'Berita berhasil disimpan!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan berita. Silakan coba lagi.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'announcement_categories_id' => 'required|integer|exists:announcement_categories,id', // Memastikan category_id yang diinput ada dalam tabel announcement_categories
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->Title = $request->title;
        $announcement->Description = $request->description;
        $announcement->Announcement_categories_id = $request->announcement_categories_id;
        // Buat slug dari judul (misalnya)
        $announcement->Slug = Str::slug($request->title); 
        $announcement->save();

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit pengumuman
        $announcement = Announcement::findOrFail($id);
        $categories = Announcement_category::all(); // Mengambil semua kategori
        return view('admin.announcement.edit', compact('announcement', 'categories'));
    }

    public function destroy($id)
{
    // Menghapus news dari database
    $news = News::findOrFail($id);

    // Hapus foto dari storage jika ada
    if (Storage::disk('public')->exists('uploads/' . $news->photo)) {
        Storage::disk('public')->delete('uploads/' . $news->photo);
    }

    $news->delete();

    return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
}
}
