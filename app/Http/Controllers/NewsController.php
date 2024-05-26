<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Newscategory; // Import model Newscategory

class NewsController extends Controller
{
    public function index()
    {
        // Ambil berita biasa
        $news = News::orderBy('created_at', 'desc')->simplePaginate(3);

        // Ambil berita populer
        $popularNews = News::orderBy('total_visitors', 'desc')->take(5)->get();
        $newscategories = Newscategory::all();

        return view('News.News', ['news' => $news, 'popularNews' => $popularNews, 'newscategories' => $newscategories]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $news->total_visitors += 1; // Increment total visitors
        $news->save();

        return view('news.show', compact('news'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search based on the query
        $searchResults = News::where('title', 'like', '%' . $query . '%')
                            ->orWhere('description', 'like', '%' . $query . '%')
                            ->paginate(3);

        return view('News.SearchResults', ['searchResults' => $searchResults, 'query' => $query]);
    }

public function filterByCategory($id)
{
    $category = Newscategory::find($id);

    if (!$category) {
        abort(404, 'Category not found');
    }

    $news = News::where('news_category_id', $id)->paginate(3);
    $newscategories = Newscategory::all();
    $popularNews = News::orderBy('total_visitors', 'desc')->take(5)->get();

    return view('News.News', compact('news', 'popularNews', 'newscategories', 'category'));
}

}

