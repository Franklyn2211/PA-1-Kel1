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
        $news = News::simplePaginate(2);
        
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
    
    // Lakukan pencarian berdasarkan query
    $searchResults = News::where('title', 'like', '%' . $query . '%')
                        ->orWhere('description', 'like', '%' . $query . '%')
                        ->paginate(10);
    
    return view('News.SearchResults', ['searchResults' => $searchResults, 'query' => $query]);
}

}

