<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data_Yayasan;

class DataYayasanController extends Controller
{
    public function index()
    {
        // Retrieve a single data yayasan
        $dataYayasan = Data_Yayasan::first();
        
        // Return the view with data yayasan
        return view('admin.DataYayasan.index', compact('dataYayasan'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'nama_yayasan' => 'required|max:50',
            'singkatan_nama_yayasan' => 'required|max:20',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'input_logo_yayasan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the data yayasan already exists
        $dataYayasan = Data_Yayasan::first();

        // If data yayasan exists, update the attributes
        if ($dataYayasan) {
            $dataYayasan->nama_yayasan = $validatedData['nama_yayasan'];
            $dataYayasan->singkatan_nama_yayasan = $validatedData['singkatan_nama_yayasan'];
            $dataYayasan->sejarah = $validatedData['sejarah'];
            $dataYayasan->visi = $validatedData['visi'];
            $dataYayasan->misi = $validatedData['misi'];

            // Handle image upload if provided
            if ($request->hasFile('input_logo_yayasan')) {
                $image = $request->file('input_logo_yayasan');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $dataYayasan->logo_yayasan = 'images/'.$imageName;
            }

            $dataYayasan->save();
        } else {
            // If data yayasan doesn't exist, create a new one
            $dataYayasan = new Data_Yayasan();
            $dataYayasan->nama_yayasan = $validatedData['nama_yayasan'];
            $dataYayasan->singkatan_nama_yayasan = $validatedData['singkatan_nama_yayasan'];
            $dataYayasan->sejarah = $validatedData['sejarah'];
            $dataYayasan->visi = $validatedData['visi'];
            $dataYayasan->misi = $validatedData['misi'];

            // Handle image upload if provided
            if ($request->hasFile('input_logo_yayasan')) {
                $image = $request->file('input_logo_yayasan');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $dataYayasan->logo_yayasan = 'images/'.$imageName;
            }

            $dataYayasan->save();
        }

        // Redirect back to the index page with success message
        return redirect()->route('admin.data_yayasan.index')->with('success', 'Data yayasan updated successfully');
    }
}
