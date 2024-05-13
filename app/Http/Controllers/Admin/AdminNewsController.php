<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Newscategory;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::all(); // Assuming you're fetching news from a model named News
        $newscategories = Newscategory::all(); // Fetch all news categories
        return view('Admin.News.index', ['news' => $news, 'newscategories' => $newscategories]);
    }

    public function create()
    {
        // Menampilkan form untuk membuat news baru
        $categories = Newscategory::all(); // Mengambil semua kategori
        return view('Admin.News.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000', // Sesuaikan validasi untuk photo
            'location' => 'required|string',
            'date' => 'required|date',
        ]);

        $news = new News([
            'id_news' => News::generateNextId(),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'location' => $request->get('location'),
            'date' => $request->get('date'),
        ]);

        $newsCategory = NewsCategory::findOrFail($request->get('news_category_id'));
        $news->category()->associate($newsCategory);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/photo';
            $file->move($destinationPath, $filename);
            $news->photo = $filename;
        }

        $news->save();
        return redirect()->route('Admin.News.index')->with('success', 'Berita berhasil disimpan!');
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'location' => 'required|string',
            'date' => 'required|date',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
        ];

        // Menghandle foto
        if ($request->hasFile('photo')) {
            // Menghapus foto lama jika ada
            if ($news->photo) {
                Storage::disk('public')->delete('photo/' . $news->photo);
            }

            // Menyimpan foto baru
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/photo';
            $file->move($destinationPath, $filename);
            $data['photo'] = $filename;
        }

        $news->update($data);
        return redirect()->route('Admin.News.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function edit(News $news)
    {
        $categories = Newscategory::all();
        return view('Admin.News.edit', compact('news', 'categories'));
    }

    public function destroy($id)
    {
        // Menghapus news dari database
        $news = News::findOrFail($id);

        // Hapus foto dari storage jika ada
        if (Storage::disk('public')->exists('photo/' . $news->photo)) {
            Storage::disk('public')->delete('photo/' . $news->photo);
        }

        $news->delete();

        return redirect()->route('Admin.News.index')->with('success', 'Berita berhasil dihapus');
    }
}
