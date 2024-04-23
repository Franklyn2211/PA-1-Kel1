<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero_Section;

class HeroSectionController extends Controller
{
    public function index()
    {
        // Retrieve a single hero section
        $dataHeroSection = Hero_Section::first();
        
        // Return the view with hero section data
        return view('admin.HeroSection.index', compact('dataHeroSection'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'input_judul_header' => 'required|max:50',
            'input_deskripsi_header' => 'nullable|max:300',
            'input_bg_hero' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the hero section already exists
        $heroSection = Hero_Section::first();

        // If hero section exists, update the attributes
        if ($heroSection) {
            $heroSection->header = $validatedData['input_judul_header'];
            $heroSection->paragraph = $validatedData['input_deskripsi_header'];

            // Handle image upload if provided
            if ($request->hasFile('input_bg_hero')) {
                $image = $request->file('input_bg_hero');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $heroSection->bg_image = 'images/'.$imageName;
            }

            $heroSection->save();
        } else {
            // If hero section doesn't exist, create a new one
            $heroSection = new Hero_Section();
            $heroSection->header = $validatedData['input_judul_header'];
            $heroSection->paragraph = $validatedData['input_deskripsi_header'];

            // Handle image upload if provided
            if ($request->hasFile('input_bg_hero')) {
                $image = $request->file('input_bg_hero');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $heroSection->bg_image = 'images/'.$imageName;
            }

            $heroSection->save();
        }

        // Redirect back to the index page with success message
        return redirect()->route('admin.hero.index')->with('success', 'Hero section updated successfully');
    }
}
