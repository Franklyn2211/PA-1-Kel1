<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $program = Program::all();
        return view('Admin.Program.index', compact('program'));
    }

    public function create()
    {
        return view('Admin.Program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_title' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        $program = new Program([
            'id_programs' => Program::generateNextId(),
            'program_title' => $request->get('program_title'),
            'Description' => $request->get('Description'),
        ]);

        $program->save();
        return redirect()->route('Admin.Program.index')->with('success', 'Program berhasil disimpan!');

    }

    public function edit(Program $program)
    {
        return view('Admin.Program.edit', compact('program'));
    }
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'program_title' => 'required|string|max:255',
            'Description' => 'required|string'
        ]);

        $data = [
            'program_title' => $request->program_title,
            'Description' => $request->Description,
        ];

        $program->update($data);

        return redirect()->route('Admin.Program.index')->with('success', 'Program telah di edit');
    }

    public function destroy($id)
    {
        // Menghapus news dari database
        $program = Program::findOrFail($id);

        $program->delete();

        return redirect()->route('Admin.Program.index')->with('success', 'Program berhasil dihapus');
    }
}
