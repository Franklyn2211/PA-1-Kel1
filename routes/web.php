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
Route::middleware('auth')->prefix('Admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::resource('relawan', \App\Http\Controllers\Admin\RelawanController::class)->except('destroy');
    Route::delete('relawan/{relawan}', [\App\Http\Controllers\Admin\RelawanController::class, 'destroy'])->name('relawan.destroy');
    Route::resource('news', AdminNewsController::class)->except('show');
    Route::resource('newsCategory', NewsCategoryController::class)->except('show');
    Route::get('donatur', [DonaturController::class, 'index'])->name('Admin.donate.donate');
    Route::delete('donatur/{donate}', [DonaturController::class, 'destroy'])->name('donate.destroy');
});

// Route Bagian Tampilan Website
Route::resource('Home', HomeController::class)->only('index');
Route::resource('Announcement', AnnouncementController::class);
Route::resource('News', NewsController::class)->only('index', 'show');
Route::resource('About', AboutController::class)->only('index');
Route::resource('Donate', DonateController::class)->only('index', 'store');
Route::resource('Partnership', PartnershipController::class)->only('index');
Route::resource('Sponsor', SponsorController::class)->only('index');
Route::resource('Contact', ContactController::class)->only('index');
Route::resource('Statistics', StatisticsController::class)->only('index');
Route::resource('Volunteer', VolunteerController::class)->only('index');
Route::resource('Relawan', RelawanController::class)->only('index', 'store');

Route::get('/donasi', [DonateController::class, 'donate'])->name('donate.donate');
Route::post('/donasi', [DonateController::class, 'store'])->name('donate.store');

