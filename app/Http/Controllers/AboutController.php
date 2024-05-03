<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StafPegawai;
use App\Models\Data_yayasan;

class AboutController extends Controller
{
    public function index()
{
    // Retrieve a single hero section
    $dataYayasan = Data_yayasan::first();
    $stafpegawai = StafPegawai::all();

    // Return the view with hero section data
    return view('About.About', compact('dataYayasan', 'stafpegawai'));
}

}
