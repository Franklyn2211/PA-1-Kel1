<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnakDisabilitas; // Sesuaikan dengan model yang sesuai
use App\Models\AnakSekolahInformal;
use App\Models\StafPegawai;
use App\Models\Volunteer;

class StatistikController extends Controller
{
    public function index()
    {
        $anakDisabilitas = AnakDisabilitas::all();
        $anakSekolahInformal = AnakSekolahInformal::all();
        $stafPegawai = StafPegawai::all();
        $volunteer = Volunteer::all();

        return view('statistik.statistics', compact('anakDisabilitas', 'anakSekolahInformal', 'stafPegawai', 'volunteer'));
    }
}
