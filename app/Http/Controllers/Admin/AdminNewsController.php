<?php

namespace App\Http\Controllers\Admin; // Tambahkan namespace yang sesuai

use Illuminate\Http\Request;
use App\Models\News; // Sesuaikan namespace model
use App\Models\NewsCategory; // Sesuaikan namespace model
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class AdminNewsController extends Controller
{
    public function create()
    {
        // Mengambil semua kategori berita
        $categories = NewsCategory::all();

        // Mengirim data kategori ke view create
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'photo' => 'required|image|max:2048', // assuming photo is uploaded as an image
            'news_category_id' => 'required|exists:news_categories,id',
            'is_share' => 'required|boolean',
            'description' => 'required|string',
            'created_by' => 'required|string|max:20',
        ]);

        // Simpan data baru ke dalam database
        $news = new News();
        $news->title = $validatedData['title'];
        $news->slug = Str::slug($validatedData['title']); // generate slug from title
        $news->location = $validatedData['location'];
        $news->tanggal = $validatedData['tanggal'];
        $news->news_category_id = $validatedData['news_category_id'];
        $news->is_share = $validatedData['is_share'];
        $news->description = $validatedData['description'];
        $news->created_by = $validatedData['created_by'];

        // Upload foto dan simpan path-nya
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $news->photo = $photoPath;
        }

        $news->save();

        // Redirect dengan flash message
        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil disimpan.');
    }

    public function edit(News $news) // Ubah parameter menjadi News
    {
        // Mengambil data kategori berita
        $categories = NewsCategory::all();

        // Mengirim data berita yang akan diedit ke view edit
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news) // Ubah parameter menjadi News
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'photo' => 'nullable|image|max:2048', // photo is optional for update
            'news_category_id' => 'required|exists:news_categories,id',
            'is_share' => 'required|boolean',
            'description' => 'required|string',
            'updated_by' => 'required|string|max:20',
        ]);

        // Update data berita
        $news->title = $validatedData['title'];
        $news->slug = Str::slug($validatedData['title']); // generate slug from title
        $news->tanggal = $validatedData['tanggal'];
        $news->news_category_id = $validatedData['news_category_id'];
        $news->is_share = $validatedData['is_share'];
        $news->description = $validatedData['description'];
        $news->updated_by = $validatedData['updated_by'];

        // Jika ada foto baru diupload, update foto
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $news->photo = $photoPath;
        }

        $news->save();

        // Redirect dengan flash message
        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }
}
