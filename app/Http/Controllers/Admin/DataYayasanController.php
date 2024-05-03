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

    public function create(){
        return view('Admin.DataYayasan.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_yayasan' => 'required|max:50',
            'singkatan_nama_yayasan' => 'required|max:20',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $dataYayasan = new Data_yayasan([
            'id_data_yayasans' => Data_yayasan::generateNextId(),
            'nama_yayasan' => $request->get('nama_yayasan'),
           'singkatan_nama_yayasan' => $request->get('singkatan_nama_yayasan'),
           'sejarah' => $request->get('sejarah'),
            'visi' => $request->get('visi'),
           'misi' => $request->get('misi')
       ]);
       if ($request->hasFile('logo_yayasan')) {
        $file = $request->file('logo_yayasan');
        $filename = $file->getClientOriginalName();
        $destinationPath = 'storage/app/public/logoyayasan';
        $file->move($destinationPath, $filename);
        $dataYayasan->logo_yayasan = $filename;
    }

    $dataYayasan->save();
    return redirect()->route('Admin.DataYayasan.index')->with('success', 'Data Yayasan berhasil disimpan!');

    }

    public function edit(Data_yayasan $dataYayasan){
        return view('Admin.DataYayasan.edit', compact('dataYayasan'));
    }
    public function update(Request $request, Data_yayasan $dataYayasan)
    {
        $request->validate([
            'nama_yayasan' => 'required|max:50',
            'singkatan_nama_yayasan' => 'required|max:20',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $data = [
            'nama_yayasan' => $request->nama_yayasan,
           'singkatan_nama_yayasan' => $request->singkatan_nama_yayasan,
           'sejarah' => $request->sejarah,
           'visi' => $request->visi,
           'misi' => $request->misi,
        ];
        // Menghandle foto
        if ($request->hasFile('logo_yayasan')) {
            // Menghapus foto lama jika ada
            if ($dataYayasan->logo_yayasan) {
                Storage::disk('public')->delete('logoyayasan/' . $dataYayasan->logo_yayasan);
            }

            // Menyimpan foto baru
            $file = $request->file('logo_yayasan');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'storage/app/public/logoyayasan';
            $file->move($destinationPath, $filename);
            $data['logo_yayasan'] = $filename;
        }

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
