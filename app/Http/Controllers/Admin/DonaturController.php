<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        $donates = Donate::all();
        return view('Admin.donatur.donatur', compact('donates'));
    }

    public function destroy($id)
    {
        $donates = Donate::findOrFail($id);

        $donates->delete();

        return back()->with('success', 'Donatur berhasil dihapus.');

    }
}
