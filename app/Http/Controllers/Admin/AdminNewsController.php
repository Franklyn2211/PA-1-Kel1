<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Newscategory; // Menggunakan model Newscategory
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Import Str untuk membuat slug
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::all(); // Assuming you're fetching news from a model named News
        return view('Admin.News.index', ['news' => $news]);
    }

    public function create()
    {
        // Menampilkan form untuk membuat news baru
        $categories = Newscategory::all(); // Mengambil semua kategori
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'news_category_id' => 'required|integer|exists:news_categories,id', // Perbaiki pengecekan nama tabel
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:5000', // Hapus 'file' karena tidak diperlukan
            'location' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $file = $request -> file('photo');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'asset/photo';

        $file->move($tujuanFile,$namaFile);
        $slug = Str::slug($request->name, '-');
            $news = new News();

            $news->title = $request->title;
            $news->description = $request->description;
            $news->news_category_id = $request->news_category_id;
            $news->location = $request->location;
            $news->tanggal = $request->tanggal;


            $news->save();

            return redirect()->route('admin.news.index')->with('success', 'Berita berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'news_category_id' => 'required|integer|exists:news_categories,id', // Memastikan category_id yang diinput ada dalam tabel newscategories
            'location' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->description = $request->description;
        $news->news_category_id = $request->news_category_id;
        $news->location = $request->location;
        $news->tanggal = $request->tanggal;

        // Buat slug dari judul (misalnya)
        $news->slug = Str::slug($request->title); 
        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit news
        $news = News::findOrFail($id);
        $categories = Newscategory::all(); // Mengambil semua kategori
        return view('admin.news.edit', compact('news', 'categories'));
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
