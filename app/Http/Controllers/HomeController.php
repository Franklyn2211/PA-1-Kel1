<?php
namespace App\Http\Controllers;

use App\Models\AnakDisabilitas;
use App\Models\AnakSekolahInformal;
use App\Models\Announcement;
use App\Models\Donate;
use App\Models\Kemitraan;
use App\Models\News;
use App\Models\Testimoni;
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
        $announcement = Announcement::all();
        $kemitraan = Kemitraan::all();
        $sponsors = Sponsor::all();

        //statistik
        $totalDonatur = Donate::where('status', 1)->count();
        $totalKemitraan = Kemitraan::count();
        $totalAnakDisabilitas = AnakDisabilitas::count();
        $totalSiswaInformal = AnakSekolahInformal::count();
        $testimoni = Testimoni::all();

        return view('Home.Home', compact(
            'heroSection',
            'galleries',
            'news',
            'announcement',
            'kemitraan',
            'totalDonatur',
            'totalKemitraan',
            'totalAnakDisabilitas',
            'totalSiswaInformal',
            'testimoni',
            'sponsors'
        ));
    }
}
