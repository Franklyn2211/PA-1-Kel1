<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $newsCategories = NewsCategory::all();
        return view('Admin.NewsCategory.index', compact('newsCategories'));
    }

    public function create()
    {
        return view('Admin.NewsCategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        $newsCategories = new NewsCategory([
            'id_news_categories' => NewsCategory::generateNextId(),
            'Name' => $request->get('Name'),
            'Description' => $request->get('Description'),
        ]);
        $newsCategories->save();

        return redirect()->route('Admin.NewsCategory.index')->with('success', 'Kategori Berita berhasil ditambahkan!');
    }


    public function edit(NewsCategory $newsCategory)
    {
        return view('Admin.NewsCategory.edit', compact('newsCategory'));
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        $newsCategory->update([
            'Name' => $request->Name,
            'Description' => $request->Description,
        ]);

        return redirect()->route('Admin.NewsCategory.index')->with('success', 'Kategori Berita berhasil diperbarui!');
    }

    public function destroy($id)
{
    $newsCategory = NewsCategory::findOrFail($id);
    $newsCategory->delete();

    return redirect()->route('Admin.NewsCategory.index')->with('success', 'Kategori Berita berhasil dihapus!');
}

}
