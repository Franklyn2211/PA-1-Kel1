<?php
namespace App\Http\Controllers;

use App\Models\AnakDisabilitas;
use App\Models\AnakSekolahInformal;
use App\Models\Donate;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Hero_Section;
use App\Models\Gallery; // Import Gallery model if it's not already imported
use App\Models\Sponsor;
use App\Models\StafPegawai;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve hero section data
        $heroSection = Hero_Section::first();

        // Retrieve gallery data (assuming you want to use it as well)
        $galleries = Gallery::all();
        $news = News::all();
        $sponsors = Sponsor::all();

        //statistik
        $totalDonatur = Donate::count();
        $totalSponsor = Sponsor::count();
        $totalAnakDisabilitas = AnakDisabilitas::count();
        $totalSiswaInformal = AnakSekolahInformal::count();
        $totalStaf = StafPegawai::count();

        return view('Home.Home', compact(
            'heroSection',
            'galleries',
            'news',
            'totalDonatur',
            'totalSponsor',
            'totalAnakDisabilitas',
            'totalSiswaInformal',
            'totalStaf',
            'sponsors'
        ));
    }
}
