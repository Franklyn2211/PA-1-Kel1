<?php

namespace App\Http\Controllers;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    public function index()
    {
        $sponsor = Sponsor::paginate(6);
        return view('Sponsor.Sponsor', compact('sponsor'));
    }


}
