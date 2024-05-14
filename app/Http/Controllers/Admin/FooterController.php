<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index(){
        $footer = Footer::first();
        return view('Admin.Footer.index', compact('footer'));
    }

    public function create(){
        return view('Admin.footer.create');
    }

    public function store(Request $request){
        $request->validate([
            'about' => 'required|string',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'facebook_url' => 'required|string',
            'instagram_url' => 'required|string',
            'youtube_url' => 'required|string',
            'tiktok_url' => 'required|string',
        ]);

        $footer = new Footer([
            'id_footer' => Footer::generateNextId(),
            'about' => $request->get('about'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'facebook_url' => $request->get('facebook_url'),
            'instagram_url' => $request->get('instagram_url'),
            'youtube_url' => $request->get('youtube_url'),
            'tiktok_url' => $request ->get('tiktok_url'),
        ]);
        $footer->save();
        return redirect()->route('Admin.Footer.index')->with('success', 'Footer berhasil di simpan');
    }

    public function edit(Footer $footer){
        return view('Admin.Footer.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer){
        $request->validate([
            'about' => 'required|string',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'facebook_url' => 'required|string',
            'instagram_url' => 'required|string',
            'youtube_url' => 'required|string',
            'tiktok_url' => 'required|string',
        ]);

        $data = [
            'about' => $request->about,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'youtube_url' => $request->youtube_url,
            'tiktok_url' => $request->tiktok_url,
        ];

        $footer->update($data);
        return redirect()->route('Admin.Footer.index')->with('success', 'Footer berhasil di perbarui');
    }

    public function destroy($id){
        $footer = Footer::findOrFail($id);
        $footer->delete();
        return redirect()->route('Admin.Footer.index')->with('success', 'Footer berhasil dihapus');
    }
}
