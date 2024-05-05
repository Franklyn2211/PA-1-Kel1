<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnakDisabilitas;
use App\Models\AnakSekolahInformal;
use App\Models\Announcement;
use App\Models\Donate;
use App\Models\Kemitraan;
use App\Models\Relawan;
use App\Models\News;
use App\Models\Sponsor;
use App\Models\StafPegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRelawan = Relawan::count(); // Mengambil jumlah total relawan dari database
        $totalDonatur = Donate::count();
        $totalNews = News::count();
        $totalAnnouncement = Announcement::count();
        $totalSponsor = Sponsor::count();
        $totalKemitraan = Kemitraan::count();
        $totalAnakDisabilitas = AnakDisabilitas::count();
        $totalSiswaInformal = AnakSekolahInformal::count();
        $totalStaf = StafPegawai::count();

        return view('Admin.dashboard', compact(
            'totalRelawan',
            'totalDonatur',
            'totalNews',
            'totalAnnouncement',
            'totalSponsor',
            'totalKemitraan',
            'totalAnakDisabilitas',
            'totalSiswaInformal',
            'totalStaf'
        ));
    }
}
