<?php

use App\Http\Controllers\Admin\TestimoniesController;
use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\SponsorsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\DonaturController;
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
use App\Http\Controllers\Admin\AdminKontakController;
use App\Http\Controllers\Admin\AdminRelawanController;
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

    Route::get('/', [DashboardController::class, 'index'])->name('Admin.dashboard');

    Route::get('relawan', [AdminRelawanController::class, 'index'])->name('Admin.relawan.relawan');
    Route::delete('relawan/{relawan}', [AdminRelawanController::class, 'destroy'])->name('relawan.destroy');


    Route::get('kontak', [AdminKontakController::class, 'index'])->name('Admin.kontak.kontak');
    Route::delete('kontak/{kontak}', [AdminKontakController::class, 'destroy'])->name('kontak.destroy');



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
    Route::get('Announcements', [AdminAnnouncementController::class, 'index'])->name('Admin.Announcement.index');
    Route::get('Announcements/create', [AdminAnnouncementController::class, 'create'])->name('Admin.Announcement.create');
    Route::post('Announcements', [AdminAnnouncementController::class, 'store'])->name('Admin.Announcement.store');
    Route::get('Announcements/{announcements}/edit', [AdminAnnouncementController::class, 'edit'])->name('Admin.Announcement.edit');
    Route::post('Announcements/{announcements}', [AdminAnnouncementController::class, 'update'])->name('Admin.Announcement.update');
    Route::delete('Announcements/{announcements}', [AdminAnnouncementController::class, 'destroy'])->name('Admin.Announcement.destroy');
    // Routes for announcement category management
    Route::get('AnnouncementCategory', [AnnouncementCategoryController::class, 'index'])->name('Admin.AnnouncementCategory.index');
    Route::get('AnnouncementCategory/create', [AnnouncementCategoryController::class, 'create'])->name('Admin.AnnouncementCategory.create');
    Route::post('AnnouncementCategory', [AnnouncementCategoryController::class, 'store'])->name('Admin.AnnouncementCategory.store');
    Route::get('AnnouncementCategory/{announcementCategory}/edit', [AnnouncementCategoryController::class, 'edit'])->name('Admin.AnnouncementCategory.edit');
    Route::post('announcementCategory/{announcementCategory}', [AnnouncementCategoryController::class, 'update'])->name('Admin.AnnouncementCategory.update');
    Route::delete('announcementCategory/{announcementCategory}', [AnnouncementCategoryController::class, 'destroy'])->name('Admin.AnnouncementCategory.destroy');


    Route::get('home', [HeroSectionController::class, 'index'])->name('Admin.HeroSection.index');
    Route::get('home/create', [HeroSectionController::class, 'create'])->name('Admin.HeroSection.create');
    Route::post('home', [HeroSectionController::class, 'store'])->name('Admin.HeroSection.store');
    Route::get('home/{heroSection}/edit', [HeroSectionController::class, 'edit'])->name('Admin.HeroSection.edit');
    Route::post('home/{heroSection}', [HeroSectionController::class, 'update'])->name('Admin.HeroSection.update');
    Route::delete('home/{heroSection}', [HeroSectionController::class, 'destroy'])->name('Admin.HeroSection.destroy');

    Route::get('data-yayasan', [DataYayasanController::class, 'index'])->name('Admin.DataYayasan.index');
    Route::get('/create-data-yayasan', [DataYayasanController::class, 'create'])->name('Admin.DataYayasan.create');
    Route::post('/data-yayasan', [DataYayasanController::class, 'store'])->name('Admin.DataYayasan.store');
    Route::get('data-yayasan/{dataYayasan}/edit', [DataYayasanController::class, 'edit'])->name('Admin.DataYayasan.edit');
    Route::post('data-yayasan/{dataYayasan}', [DataYayasanController::class, 'update'])->name('Admin.DataYayasan.update');
    Route::delete('data-yayasan/{dataYayasan}', [DataYayasanController::class, 'destroy'])->name('Admin.DataYayasan.destroy');

    Route::get('gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('Admin/gallery/{galleries}/edit', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::post('Admin/gallery/{galleries}', [GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('gallery/{galleries}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');



        Route::get('address', [AddressController::class, 'index'])->name('admin.address.index');
        Route::get('address/create', [AddressController::class, 'create'])->name('admin.address.create');
        Route::post('address/store', [AddressController::class, 'store'])->name('admin.address.store');
        Route::get('address/{id}/edit', [AddressController::class, 'edit'])->name('admin.address.edit');
        Route::post('address/update/{id}', [AddressController::class, 'update'])->name('admin.address.update');
        Route::delete('address/{id}', [AddressController::class, 'destroy'])->name('admin.address.destroy');


    Route::get('address', [AddressController::class, 'index'])->name('admin.address.index');
    Route::get('address/create', [AddressController::class, 'create'])->name('admin.address.create');
    Route::post('address/store', [AddressController::class, 'store'])->name('admin.address.store');
    Route::get('address/{id}/edit', [AddressController::class, 'edit'])->name('admin.address.edit');
    Route::post('address/update/{id}', [AddressController::class, 'update'])->name('admin.address.update');
    Route::delete('address/{id}', [AddressController::class, 'destroy'])->name('admin.address.destroy');

    Route::get('anakdisabilitas', [AnakDisabilitasController::class, 'index'])->name('admin.anakdisabilitas.index');
    Route::get('anakdisabilitas/create', [AnakDisabilitasController::class, 'create'])->name('admin.anakdisabilitas.create');
    Route::post('anakdisabilitas', [AnakDisabilitasController::class, 'store'])->name('admin.anakdisabilitas.store');
    Route::get('anakdisabilitas/{id}', [AnakDisabilitasController::class, 'show'])->name('admin.anakdisabilitas.show');
    Route::get('anakdisabilitas/{anakdisabilitas}/edit', [AnakDisabilitasController::class, 'edit'])->name('admin.anakdisabilitas.edit');
    Route::put('anakdisabilitas/{anakdisabilitas}', [AnakDisabilitasController::class, 'update'])->name('admin.anakdisabilitas.update');
    Route::delete('anakdisabilitas/{anakdisabilitas}', [AnakDisabilitasController::class, 'destroy'])->name('admin.anakdisabilitas.destroy');

    Route::get('anaksekolahinformal', [AnakSekolahInformalController::class, 'index'])->name('admin.anaksekolahinformal.index');
    Route::get('anaksekolahinformal/create', [AnakSekolahInformalController::class, 'create'])->name('admin.anaksekolahinformal.create');
    Route::post('anaksekolahinformal/store', [AnakSekolahInformalController::class, 'store'])->name('admin.anaksekolahinformal.store');
    Route::post('anaksekolahinformal/{anaksekolahinformal}', [AnakSekolahInformalController::class, 'show'])->name('admin.anaksekolahinformal.show');
    Route::get('anaksekolahinformal/{anaksekolahinformal}/edit', [AnakSekolahInformalController::class, 'edit'])->name('admin.anaksekolahinformal.edit');
    Route::post('anaksekolahinformal/{anaksekolahinformal}', [AnakSekolahInformalController::class, 'update'])->name('admin.anaksekolahinformal.update');
    Route::delete('anaksekolahinformal/{anaksekolahinformal}', [AnakSekolahInformalController::class, 'destroy'])->name('admin.anaksekolahinformal.destroy');

    Route::resource('stafpegawai', StafPegawaiController::class);
    Route::get('stafpegawai', [StafPegawaiController::class, 'index'])->name('admin.stafpegawai.index');
    Route::get('stafpegawai/create', [StafPegawaiController::class, 'create'])->name('admin.stafpegawai.create');
    Route::post('stafpegawai', [StafPegawaiController::class, 'store'])->name('admin.stafpegawai.store');
    Route::get('stafpegawai/{stafpegawai}', [StafPegawaiController::class, 'show'])->name('admin.stafpegawai.show');
    Route::get('stafpegawai/{stafpegawai}/edit', [StafPegawaiController::class, 'edit'])->name('admin.stafpegawai.edit');
    Route::post('stafpegawai/{stafpegawai}', [StafPegawaiController::class, 'update'])->name('admin.stafpegawai.update');
    Route::delete('stafpegawai/{stafpegawai}', [StafPegawaiController::class, 'destroy'])->name('admin.stafpegawai.destroy');

    Route::resource('sponsor', SponsorController::class);
    Route::get('sponsor', [SponsorController::class, 'index'])->name('admin.sponsor.index');
    Route::get('sponsor/create', [SponsorController::class, 'create'])->name('admin.sponsor.create');
    Route::post('sponsor', [SponsorController::class, 'store'])->name('admin.sponsor.store');
    Route::get('sponsor/{sponsor}/edit', [SponsorController::class, 'edit'])->name('admin.sponsor.edit');
    Route::post('sponsor/{sponsor}', [SponsorController::class, 'update'])->name('admin.sponsor.update');
    Route::delete('sponsor/{sponsor}', [SponsorController::class, 'destroy'])->name('admin.sponsor.destroy');

    Route::resource('kemitraan', KemitraanController::class);
    Route::get('kemitraan', [KemitraanController::class, 'index'])->name('admin.kemitraan.index');
    Route::get('kemitraan/create', [KemitraanController::class, 'create'])->name('admin.kemitraan.create');
    Route::post('kemitraan', [KemitraanController::class, 'store'])->name('admin.kemitraan.store');
    Route::get('kemitraan/{kemitraan}/edit', [KemitraanController::class, 'edit'])->name('admin.kemitraan.edit');
    Route::post('kemitraan/{kemitraan}', [KemitraanController::class, 'update'])->name('admin.kemitraan.update');
    Route::delete('kemitraan/{kemitraan}', [KemitraanController::class, 'destroy'])->name('admin.kemitraan.destroy');

    Route::resource('testimoni', TestimoniesController::class);
    Route::get('testimoni', [TestimoniesController::class, 'index'])->name('admin.testimoni.index');
    Route::get('testimoni/create', [TestimoniesController::class, 'create'])->name('admin.testimoni.create');
    Route::post('testimoni', [TestimoniesController::class, 'store'])->name('admin.testimoni.store');
    Route::get('testimoni/{testimoni}/edit', [TestimoniesController::class, 'edit'])->name('admin.testimoni.edit');
    Route::post('testimoni/{testimoni}', [TestimoniesController::class, 'update'])->name('admin.testimoni.update');
    Route::delete('testimoni/{testimoni}', [TestimoniesController::class, 'destroy'])->name('admin.testimoni.destroy');

    Route::get('Footer', [App\Http\Controllers\Admin\FooterController::class, 'index'])->name('Admin.Footer.index');
    Route::get('Footer/create', [App\Http\Controllers\Admin\FooterController::class, 'create'])->name('Admin.Footer.create');
    Route::post('Footer', [App\Http\Controllers\Admin\FooterController::class, 'store'])->name('Admin.Footer.store');
    Route::get('Footer/{footer}/edit', [App\Http\Controllers\Admin\FooterController::class, 'edit'])->name('Admin.Footer.edit');
    Route::post('Footer/{footer}', [App\Http\Controllers\Admin\FooterController::class, 'update'])->name('Admin.Footer.update');
    Route::delete('Footer/{footer}', [App\Http\Controllers\Admin\FooterController::class, 'destroy'])->name('Admin.Footer.destroy');

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
Route::resource('Contact', KontakController::class)->only('index', 'store');
Route::resource('Statistics', StatistikController::class)->only('index');
Route::resource('Sponsor', SponsorsController::class)->only('index');
Route::resource('Relawan', RelawanController::class)->only('index', 'store');

Route::get('/donate', [DonateController::class, 'donate'])->name('donate.donate');
Route::post('/donate', [DonateController::class, 'store'])->name('donate.store');

Route::get('/kontak', [KontakController::class, 'kontak'])->name('kontak.kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('/relawan', [RelawanController::class, 'relawan'])->name('relawan.relawan');
Route::post('/relawan', [RelawanController::class, 'store'])->name('relawan.store');
Route::get('footer', [FooterController::class, 'index'])->name('layouts.Footer');
