<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
{
    // Retrieve a single hero section
    $news = News::first();
    
    // Return the view with hero section data
    return view('News.News', compact('news'));
}

}
