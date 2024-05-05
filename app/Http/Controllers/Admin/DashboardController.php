<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\Relawan;
use App\Models\News;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRelawan = Volunteer::count(); // Mengambil jumlah total relawan dari database
        $totalDonatur = Donate::count();
        $totalNews = News::count();
        return view('Admin.dashboard', compact('totalRelawan', 'totalDonatur', 'totalNews'));
    }
}
