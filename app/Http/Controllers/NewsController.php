<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
<<<<<<< HEAD
{
    // Retrieve a single hero section
    $news = News::first();
    
    // Return the view with hero section data
    return view('News.News', compact('news'));
}

=======
    {
        $news = News::simplePaginate(2);
        return view('News.News', ['news' => $news]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
>>>>>>> 8e8fbd57f950eb580051edf248400de82422b866
}
