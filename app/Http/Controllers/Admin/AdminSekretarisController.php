<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Secretary;
use Illuminate\Http\Request;

class AdminSekretarisController extends Controller
{
    public function index (){
        $secretaries = Secretary::get();
        return view('Admin.sekretaris.index', compact('secretaries'));
    }
    public function updateStatus(Request $request, $id)
    {
        $secretary = Secretary::findOrFail($id);
        $secretary->status = !$secretary->status;
        $secretary->save();

        $statusMessage = $secretary->status ? 'approved' : 'rejected';
        return redirect()->back()->with('message', $secretary->name . ' status has been ' . $statusMessage . ' successfully.');
    }
}
