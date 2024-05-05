<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminKontakController extends Controller
{
    public function index()
{
    $contacts = Contact::all();
    return view('Admin.kontak.Kontak', compact('contacts'));
}

    
        public function destroy($id)
        {
            $Contact = Contact::findOrFail($id);
        
            $Contact ->delete();
        
            return back()->with('success', 'Donatur berhasil dihapus.');
        
        }
}
