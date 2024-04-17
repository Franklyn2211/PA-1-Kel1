<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $newsCategories = NewsCategory::all();
        return view('admin.newsCategory.index', compact('newsCategories'));
    }

    public function create()
    {
        return view('admin.newsCategory.create');
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
        $newsCategory = new NewsCategory();
        $newsCategory->name = $request->name;
        $newsCategory->slug = $slug;
        $newsCategory->description = $request->description;
        $newsCategory->save();

        return redirect()->route('admin.newsCategory.index')->with([
            'message' => 'Kategori Berita baru berhasil ditambahkan!',
            'alert-type' => 'success'
        ]);
    }


    public function edit(NewsCategory $newsCategory)
    {
        return view('admin.newsCategory.edit', compact('newsCategory'));
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $slug = Str::slug($request->name, '-');
        $newsCategory->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.newsCategory.index')->with('success', 'Kategori Berita berhasil diperbarui!');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();

        return redirect()->route('admin.newsCategory.index')->with([
            'message' => 'Kategori Berita berhasil dihapus!',
            'alert-type' => 'success'
        ]);
    }
}
