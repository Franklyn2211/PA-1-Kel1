<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{

    public function index()
    {
        $sponsor = Sponsor::all();
        return view('admin.sponsor.index', compact('sponsor'));
    }

    public function create()
    {
        return view('admin.sponsor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        $sponsor = new Sponsor([
            'id_sponsor' => Sponsor::generateNextId(),
            'Name' => $request->get('Name'),
            'Description' => $request->get('Description'),
        ]);
        if($request->hasFile('poto')){
            $request->file('poto')->move('potosponsor/', $request->file('poto')->getClientOriginalName());
            $sponsor->poto = $request->file('poto')->getClientOriginalName();
        }
        $sponsor->save();
        return redirect()->route('admin.sponsor.index')
            ->with('success', 'Sponsor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.sponsor.edit', compact('sponsor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:50',
            'Description' => 'required|string|max:250',
        ]);

        $sponsor = Sponsor::findOrFail($id);

        if($request->hasFile('poto')){
            $request->file('poto')->move('potosponsor/', $request->file('poto')->getClientOriginalName());
            $sponsor->poto = $request->file('poto')->getClientOriginalName();
            $sponsor->save();
        }
        
        $sponsor->Name = $request->get('Name');
        $sponsor->Description = $request->get('Description');

        $sponsor->save();


        return redirect()->route('admin.sponsor.index')
            ->with('success', 'Sponsor updated successfully');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return redirect()->route('admin.sponsor.index')
            ->with('success', 'Sponsor deleted successfully');
    }
}
