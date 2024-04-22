<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Admin\DonaturController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Home.Home');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

// Route Dashboard Admin
Route::prefix('Admin')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('relawan', [\App\Http\Controllers\Admin\RelawanController::class, 'index'])->name('admin.relawan');
    Route::delete('Admin/relawan/{relawan}', [\App\Http\Controllers\Admin\RelawanController::class, 'destroy'])->name('relawan.destroy');
    Route::post('Admin/relawan', [\App\Http\Controllers\Admin\RelawanController::class, 'store'])->name('relawan.store');
    // Route::resource('news', AdminNewsController::class)->except('show');
    Route::get('donatur', [DonaturController::class, 'index'])->name('Admin.donate.donate');
    Route::delete('donatur/{donate}', [DonaturController::class, 'destroy'])->name('donate.destroy');

    // Routes for news management
    Route::get('Admin/News', [AdminNewsController::class, 'index'])->name('Admin.News.index');
    Route::get('Admin/News/create', [AdminNewsController::class, 'create'])->name('Admin.News.create');
    Route::post('Admin/News', [AdminNewsController::class, 'store'])->name('Admin.News.store');
    Route::get('news/{news}/edit', [AdminNewsController::class, 'edit'])->name('Admin.News.edit');
    Route::post('news/{news}', [AdminNewsController::class, 'update'])->name('Admin.News.update');
    Route::delete('news/{news}/delete', [AdminNewsController::class, 'destroy'])->name('Admin.News.destroy');



    // Routes for news category management
    Route::get('Admin/NewsCategory', [NewsCategoryController::class, 'index'])->name('Admin.NewsCategory.index');
    Route::get('Admin/NewsCategory/create', [NewsCategoryController::class, 'create'])->name('Admin.NewsCategory.create');
    Route::post('Admin/NewsCategory', [NewsCategoryController::class, 'store'])->name('Admin.NewsCategory.store');
    Route::get('/NewsCategory/{newsCategory}/edit', [NewsCategoryController::class, 'edit'])->name('Admin.NewsCategory.edit');
    Route::post('/NewsCategory/{newsCategory}', [NewsCategoryController::class, 'update'])->name('Admin.NewsCategory.update');
    Route::delete('Admin/NewsCategory/{newsCategory}', [NewsCategoryController::class, 'destroy'])->name('Admin.NewsCategory.destroy');

    // Routes for announcement management
    Route::get('announcements', [AdminAnnouncementController::class, 'index'])->name('admin.announcements.index');
    Route::get('announcements/create', [AdminAnnouncementController::class, 'create'])->name('admin.announcements.create');
    Route::post('announcements/store', [AdminAnnouncementController::class, 'store'])->name('admin.announcements.store');
    Route::get('announcements/{announcement}/edit', [AdminAnnouncementController::class, 'edit'])->name('admin.announcements.edit');
    Route::put('announcements/{announcement}/update', [AdminAnnouncementController::class, 'update'])->name('admin.announcements.update');
    // Routes for announcement category management
    Route::get('announcementCategories', [AnnouncementCategoryController::class, 'index'])->name('admin.announcementCategory.index');
    Route::get('announcementCategories/create', [AnnouncementCategoryController::class, 'create'])->name('admin.announcementCategory.create');
    Route::post('announcementCategories/store', [AnnouncementCategoryController::class, 'store'])->name('admin.announcementCategory.store');
    Route::get('announcementCategories/{category}/edit', [AnnouncementCategoryController::class, 'edit'])->name('admin.announcementCategory.edit');
    Route::put('announcementCategories/{category}', [AnnouncementCategoryController::class, 'update'])->name('admin.announcementCategory.update');
    Route::delete('announcementCategories/{category}', [AnnouncementCategoryController::class, 'destroy'])->name('admin.announcementCategory.destroy');

});

// Route Bagian Tampilan Website
Route::resource('Home', HomeController::class)->only('index');
Route::resource('Announcement', AnnouncementController::class);
Route::resource('News', NewsController::class)->only('index', 'show');
Route::resource('About', AboutController::class)->only('index');
Route::get('/News/{id_news}', 'NewsController@show')->name('news.show');
Route::resource('Donate', DonateController::class)->only('index', 'store');
Route::resource('Partnership', PartnershipController::class)->only('index');
Route::resource('Sponsor', SponsorController::class)->only('index');
Route::resource('Contact', ContactController::class)->only('index');
Route::resource('Statistics', StatisticsController::class)->only('index');
Route::resource('Volunteer', VolunteerController::class)->only('index');
Route::resource('Relawan', RelawanController::class)->only('index', 'store');

Route::get('/donasi', [DonateController::class, 'donate'])->name('donate.donate');
Route::post('/donasi', [DonateController::class, 'store'])->name('donate.store');

