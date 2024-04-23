<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero_Section;
use App\Models\Gallery; // Import Gallery model if it's not already imported

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve hero section data
        $dataHeroSection = Hero_Section::first();

        // Retrieve gallery data (assuming you want to use it as well)
        $galleries = Gallery::all();

        // Return the view with both sets of data
        return view('Home.Home', compact('dataHeroSection', 'galleries'));
    }
}
