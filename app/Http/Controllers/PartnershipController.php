<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kemitraan; // Sesuaikan dengan nama model yang Anda gunakan untuk kemitraan

class PartnershipController extends Controller
{
    public function index()
    {
        $kemitraan = Kemitraan::all(); // Mengambil semua data kemitraan dari database

        return view('partnership.partnership', compact('kemitraan')); // Menyediakan data kemitraan ke tampilan user
    }
}
