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
        $anakDisabilitas = AnakDisabilitas::all();
        $anakSekolahInformal = AnakSekolahInformal::all();
        $stafPegawai = StafPegawai::all();
        $donates = Donate::all();
        $relawans = Relawan::all();

        return view('statistik.statistics', compact('anakDisabilitas', 'anakSekolahInformal', 'stafPegawai', 'donates', 'relawans'));
    }
}
