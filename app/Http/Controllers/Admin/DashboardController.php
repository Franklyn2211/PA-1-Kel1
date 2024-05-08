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
use App\Models\Testimoni;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTestimoni = Testimoni::count();
        $totalSponsor = Sponsor::count();
        $totalPengumuman = Announcement::count();
        $totalKemitraan = Kemitraan::count();
        $totalBerita = News::count();
        $totalVolunteer = Relawan::count(); // Mengambil jumlah total relawan dari database
        $totalDonatur = Donate::count();
        $totalanakdisabilitas = AnakDisabilitas::count();
        $totalSiswaInformal = AnakSekolahInformal::count();
        $totalstafpegawai = StafPegawai::count();
        return view('Admin.dashboard', compact(
            'totalKemitraan',
            'totalBerita',
            'totalVolunteer',
            'totalDonatur',
            'totalanakdisabilitas',
            'totalSiswaInformal',
            'totalstafpegawai',
            'totalPengumuman',
            'totalSponsor',
            'totalTestimoni'
        ));
    }
}
