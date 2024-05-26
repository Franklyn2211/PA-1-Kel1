<?php
namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Announcement_category;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::with('category')->paginate(3);
        return view('Announcement.Announcement', compact('announcements'));
    }

    public function showByCategory(Announcement_category $category)
    {
        $announcements = Announcement::where('announcement_category_id', $category->id_announcement_categories)->paginate(3);
        return view('Announcement.category', compact('announcements', 'category'));
    }
}
