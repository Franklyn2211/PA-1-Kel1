<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnakDisabilitas;
use App\Models\AnakSekolahInformal;
use App\Models\Donate;
use App\Models\Relawan;
use App\Models\News;
use App\Models\StafPegawai;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVolunteer = Relawan::count(); // Mengambil jumlah total relawan dari database
        $totalDonatur = Donate::count();
        $totalanakdisabilitas = AnakDisabilitas::count();
        $totalanaksekolahinformal = AnakSekolahInformal::count();
        $totalstafpegawai = StafPegawai::count();
        return view('Admin.dashboard', compact('totalVolunteer', 'totalDonatur', 'totalanakdisabilitas', 'totalanaksekolahinformal', 'totalstafpegawai' ));
    }
}
