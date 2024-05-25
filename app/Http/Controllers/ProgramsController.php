<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program; // Sesuaikan dengan nama model yang Anda gunakan untuk program

class ProgramsController extends Controller
{
    public function index()
    {
        $program = Program::all(); // Mengambil semua data program dari database

        return view('program.program', compact('program')); // Menyediakan data program ke tampilan user
    }
}
