<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnakDisabilitas; // Sesuaikan dengan model yang sesuai
use App\Models\AnakSekolahInformal;
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

        // Mengambil data donasi uang dan donasi barang secara terpisah
        $donasiUang = Donate::where('category', 'money')->get();
        $donasiBarang = Donate::where('category', 'goods')->get();

        $relawans = Relawan::all();

        return view('statistik.statistics', compact('totalAnakDisabilitas', 'totalAnakSekolahInformal', 'totalDonatur', 'totalrelawans', 'relawans', 'donasiUang', 'donasiBarang'));
    }
}
