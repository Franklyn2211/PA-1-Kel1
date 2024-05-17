<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\Kemitraan;
use App\Models\Relawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $secretaries = Auth::guard('secretaries')->id();
        $totalVolunteer = Relawan::count(); // Mengambil jumlah total relawan dari database
        $totalDonatur = Donate::count();
        $totalKemitraan = Kemitraan::count();
        return view('Secretary.dashboard', compact(
            'totalVolunteer',
            'totalDonatur',
            'totalKemitraan',
        ));
    }
}
