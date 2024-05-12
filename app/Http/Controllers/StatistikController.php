<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnakDisabilitas; // Sesuaikan dengan model yang sesuai
use App\Models\AnakSekolahInformal;
use App\Models\StafPegawai;
use App\Models\Volunteer;
use App\Models\Donate;
use App\Models\Relawan;

class StatistikController extends Controller
{
    public function index()
    {
        $totalAnakDisabilitas = AnakDisabilitas::count();
        $totalAnakSekolahInformal = AnakSekolahInformal::count();
        $totalDonatur = Donate::count();
        $totalrelawans = Relawan::count();
        $donates = Donate::all();
        $relawans = Relawan::all();

        return view('statistik.statistics', compact('totalAnakDisabilitas', 'totalAnakSekolahInformal', 'totalDonatur', 'totalrelawans', 'relawans', 'donates'));
    }
}