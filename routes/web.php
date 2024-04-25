<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Admin\DonaturController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AnakDisabilitasController;
use App\Http\Controllers\Admin\AnakSekolahInformalController;
use App\Http\Controllers\Admin\StafPegawaiController;
use App\Http\Controllers\Admin\KemitraanController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\AdminAnnouncementController;
use App\Http\Controllers\Admin\AnnouncementCategoryController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\DataYayasanController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\VolunteerController;

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
    Route::get('News', [AdminNewsController::class, 'index'])->name('Admin.News.index');
    Route::get('News/create', [AdminNewsController::class, 'create'])->name('Admin.News.create');
    Route::post('News', [AdminNewsController::class, 'store'])->name('Admin.News.store');
    Route::get('News/{news}/edit', [AdminNewsController::class, 'edit'])->name('Admin.News.edit');
    Route::post('News/{news}', [AdminNewsController::class, 'update'])->name('Admin.News.update');
    Route::delete('News/{news}/delete', [AdminNewsController::class, 'destroy'])->name('Admin.News.destroy');



    // Routes for news category management
    Route::get('NewsCategory', [NewsCategoryController::class, 'index'])->name('Admin.NewsCategory.index');
    Route::get('NewsCategory/create', [NewsCategoryController::class, 'create'])->name('Admin.NewsCategory.create');
    Route::post('NewsCategory', [NewsCategoryController::class, 'store'])->name('Admin.NewsCategory.store');
    Route::get('NewsCategory/{newsCategory}/edit', [NewsCategoryController::class, 'edit'])->name('Admin.NewsCategory.edit');
    Route::post('NewsCategory/{newsCategory}', [NewsCategoryController::class, 'update'])->name('Admin.NewsCategory.update');
    Route::delete('NewsCategory/{newsCategory}', [NewsCategoryController::class, 'destroy'])->name('Admin.NewsCategory.destroy');

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


        Route::get('hero-section', [HeroSectionController::class, 'index'])->name('admin.hero.index');
        Route::post('hero-section/update', [HeroSectionController::class, 'update'])->name('updateHeroSection');

        Route::get('/data-yayasan', [DataYayasanController::class, 'index'])->name('admin.data_yayasan.index');
        Route::post('/update-data-yayasan', [DataYayasanController::class, 'update'])->name('updateDataYayasan');

        Route::get('gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::get('gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
        Route::post('gallery', [NewsController::class, 'store'])->name('admin.gallery.store');
        Route::get('Admin/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::put('admin/gallery/update/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::delete('gallery/{id_galleries}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');



        Route::get('address', [AddressController::class, 'index'])->name('admin.address.index');
        Route::get('address/create', [AddressController::class, 'create'])->name('admin.address.create');
        Route::post('address/store', [AddressController::class, 'store'])->name('admin.address.store');
        Route::get('address/{id}/edit', [AddressController::class, 'edit'])->name('admin.address.edit');
        Route::put('address/update/{id}', [AddressController::class, 'update'])->name('admin.address.update');
        Route::delete('address/{id}', [AddressController::class, 'destroy'])->name('admin.address.destroy');



    Route::get('hero-section', [HeroSectionController::class, 'index'])->name('admin.hero.index');
    Route::post('hero-section/update', [HeroSectionController::class, 'update'])->name('updateHeroSection');

    Route::get('/data-yayasan', [DataYayasanController::class, 'index'])->name('admin.data_yayasan.index');
    Route::post('/update-data-yayasan', [DataYayasanController::class, 'update'])->name('updateDataYayasan');

    // Route::get('gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');
    // Route::get('gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
    // Route::post('gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
    // Route::get('Admin/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
    // Route::put('admin/gallery/update/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
    // Route::delete('gallery/{id_galleries}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');



    Route::get('address', [AddressController::class, 'index'])->name('admin.address.index');
    Route::get('address/create', [AddressController::class, 'create'])->name('admin.address.create');
    Route::post('address/store', [AddressController::class, 'store'])->name('admin.address.store');
    Route::get('address/{id}/edit', [AddressController::class, 'edit'])->name('admin.address.edit');
    Route::put('address/update/{id}', [AddressController::class, 'update'])->name('admin.address.update');
    Route::delete('address/{id}', [AddressController::class, 'destroy'])->name('admin.address.destroy');

    Route::resource('anakdisabilitas', AnakDisabilitasController::class);
    Route::get('anakdisabilitas', [AnakDisabilitasController::class, 'index'])->name('admin.anakdisabilitas.index');
    Route::get('anakdisabilitas/create', [AnakDisabilitasController::class, 'create'])->name('admin.anakdisabilitas.create');
    Route::post('anakdisabilitas/store', [AnakDisabilitasController::class, 'store'])->name('admin.anakdisabilitas.store');
    Route::post('anakdisabilitas/{anakdisabilitas}', [AnakDisabilitasController::class, 'show'])->name('admin.anakdisabilitas.show');
    Route::get('anakdisabilitas/{anakdisabilitas}/edit', [AnakDisabilitasController::class, 'edit'])->name('admin.anakdisabilitas.edit');
    Route::put('anakdisabilitas/{anakdisabilitas}', [AnakDisabilitasController::class, 'update'])->name('admin.anakdisabilitas.update');
    Route::delete('anakdisabilitas/{anakdisabilitas}', [AnakDisabilitasController::class, 'destroy'])->name('admin.anakdisabilitas.destroy');

    Route::resource('anaksekolahinformal', AnakSekolahInformalController::class);
    Route::get('anaksekolahinformal', [AnakSekolahInformalController::class, 'index'])->name('admin.anaksekolahinformal.index');
    Route::get('anaksekolahinformal/create', [AnakSekolahInformalController::class, 'create'])->name('admin.anaksekolahinformal.create');
    Route::post('anaksekolahinformal/store', [AnakSekolahInformalController::class, 'store'])->name('admin.anaksekolahinformal.store');
    Route::post('anaksekolahinformal/{anaksekolahinformal}', [AnakSekolahInformalController::class, 'show'])->name('admin.anaksekolahinformal.show');
    Route::get('anaksekolahinformal/{anaksekolahinformal}/edit', [AnakSekolahInformalController::class, 'edit'])->name('admin.anaksekolahinformal.edit');
    Route::put('anaksekolahinformal/{anaksekolahinformal}', [AnakSekolahInformalController::class, 'update'])->name('admin.anaksekolahinformal.update');
    Route::delete('anaksekolahinformal/{anaksekolahinformal}', [AnakSekolahInformalController::class, 'destroy'])->name('admin.anaksekolahinformal.destroy');

    Route::resource('stafpegawai', StafPegawaiController::class);
    Route::get('stafpegawai', [StafPegawaiController::class, 'index'])->name('admin.stafpegawai.index');
    Route::get('stafpegawai/create', [StafPegawaiController::class, 'create'])->name('admin.stafpegawai.create');
    Route::post('stafpegawai', [StafPegawaiController::class, 'store'])->name('admin.stafpegawai.store');
    Route::get('stafpegawai/{stafpegawai}', [StafPegawaiController::class, 'show'])->name('admin.stafpegawai.show');
    Route::get('stafpegawai/{stafpegawai}/edit', [StafPegawaiController::class, 'edit'])->name('admin.stafpegawai.edit');
    Route::put('stafpegawai/{stafpegawai}', [StafPegawaiController::class, 'update'])->name('admin.stafpegawai.update');
    Route::delete('stafpegawai/{stafpegawai}', [StafPegawaiController::class, 'destroy'])->name('admin.stafpegawai.destroy');

    Route::resource('volunteer', VolunteerController::class);
    Route::get('volunteer', [VolunteerController::class, 'index'])->name('admin.volunteer.index');
    Route::get('volunteer/create', [VolunteerController::class, 'create'])->name('admin.volunteer.create');
    Route::post('volunteer', [VolunteerController::class, 'store'])->name('admin.volunteer.store');
    Route::get('volunteer/{volunteer}', [VolunteerController::class, 'show'])->name('admin.volunteer.show');
    Route::get('volunteer/{volunteer}/edit', [VolunteerController::class, 'edit'])->name('admin.volunteer.edit');
    Route::put('volunteer/{volunteer}', [VolunteerController::class, 'update'])->name('admin.volunteer.update');
    Route::delete('volunteer/{volunteer}', [VolunteerController::class, 'destroy'])->name('admin.volunteer.destroy');

    Route::resource('sponsor', SponsorController::class);
    Route::get('sponsor', [SponsorController::class, 'index'])->name('admin.sponsor.index');
    Route::get('sponsor/create', [SponsorController::class, 'create'])->name('admin.sponsor.create');
    Route::post('sponsor', [SponsorController::class, 'store'])->name('admin.sponsor.store');
    Route::get('sponsor/{sponsor}/edit', [SponsorController::class, 'edit'])->name('admin.sponsor.edit');
    Route::put('sponsor/{sponsor}', [SponsorController::class, 'update'])->name('admin.sponsor.update');
    Route::delete('sponsor/{sponsor}', [SponsorController::class, 'destroy'])->name('admin.sponsor.destroy');

    Route::resource('kemitraan', KemitraanController::class);
    Route::get('kemitraan', [KemitraanController::class, 'index'])->name('admin.kemitraan.index');
    Route::get('kemitraan/create', [KemitraanController::class, 'create'])->name('admin.kemitraan.create');
    Route::post('kemitraan', [KemitraanController::class, 'store'])->name('admin.kemitraan.store');
    Route::get('kemitraan/{kemitraan}/edit', [KemitraanController::class, 'edit'])->name('admin.kemitraan.edit');
    Route::put('kemitraan/{kemitraan}', [KemitraanController::class, 'update'])->name('admin.kemitraan.update');
    Route::delete('kemitraan/{kemitraan}', [KemitraanController::class, 'destroy'])->name('admin.kemitraan.destroy');    



});

// Route Bagian Tampilan Website
// Route::resource('Home', HomeController::class)->only('index');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('Announcement', AnnouncementController::class);
Route::resource('News', NewsController::class)->only('index', 'show');
Route::resource('About', AboutController::class)->only('index');
Route::get('/News/{id_news}', 'NewsController@show')->name('news.show');
Route::resource('Donate', DonateController::class)->only('index', 'store');
Route::resource('Partnership', PartnershipController::class)->only('index');
Route::resource('Contact', ContactController::class)->only('index');
Route::resource('Statistics', StatistikController::class)->only('index');
Route::resource('Volunteer', VolunteerController::class)->only('index');
Route::resource('Relawan', RelawanController::class)->only('index', 'store');

Route::get('/donasi', [DonateController::class, 'donate'])->name('donate.donate');
Route::post('/donasi', [DonateController::class, 'store'])->name('donate.store');

