<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        $donates = Donate::all();
        return view('Secretary.donatur.donatur', compact('donates'));
    }

    public function updateStatus($id)
    {
        $donates = Donate::findOrFail($id);

        // Toggle status: if 1, set to 0, and if 0, set to 1
        $donates->status = $donates->status == 1 ? 0 : 1;
        $donates->save();

        return back()->with('success', 'Status relawan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $donates = Donate::findOrFail($id);

        $donates->delete();

        return back()->with('success', 'Donatur berhasil dihapus.');

    }
}
