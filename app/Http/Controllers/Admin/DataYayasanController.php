<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data_yayasan;
use Illuminate\Support\Facades\Storage;

class DataYayasanController extends Controller
{
    public function index()
    {
        $dataYayasan = Data_yayasan::all();
        return view('Admin.DataYayasan.index', compact('dataYayasan'));
    }

    public function create()
    {
        return view('Admin.DataYayasan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foundation_name' => 'required|max:50',
            'history' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $existingData = Data_yayasan::where('foundation_name', $request->get('foundation_name'))->first();
    if ($existingData) {
        return redirect()->route('Admin.DataYayasan.index')->with('error', 'Data Yayasan sudah ada!');
    }

        $dataYayasan = new Data_yayasan([
            'id_foundation_data' => Data_yayasan::generateNextId(),
            'foundation_name' => $request->get('foundation_name'),
            'history' => $request->get('history'),
            'visi' => $request->get('visi'),
            'misi' => $request->get('misi')
        ]);

        $dataYayasan->save();
        return redirect()->route('Admin.DataYayasan.index')->with('success', 'Data Yayasan berhasil disimpan!');

    }

    public function edit(Data_yayasan $dataYayasan)
    {
        return view('Admin.DataYayasan.edit', compact('dataYayasan'));
    }
    public function update(Request $request, Data_yayasan $dataYayasan)
    {
        $request->validate([
            'foundation_name' => 'required|max:50',
            'history' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $data = [
            'foundation_name' => $request->foundation_name,
            'history' => $request->history,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ];

        $dataYayasan->update($data);

        return redirect()->route('Admin.DataYayasan.index')->with('success', 'Data yayasan telah di edit');
    }

    public function destroy($id)
    {
        // Menghapus news dari database
        $dataYayasan = Data_yayasan::findOrFail($id);

        // Hapus foto dari storage jika ada
        if (Storage::disk('public')->exists('logoyayasan/' . $dataYayasan->photo)) {
            Storage::disk('public')->delete('logoyayasan/' . $dataYayasan->photo);
        }

        $dataYayasan->delete();

        return redirect()->route('Admin.DataYayasan.index')->with('success', 'Data Yayasan berhasil dihapus');
    }
}
