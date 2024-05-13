<?php

namespace App\Providers;

use App\Models\Footer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $footer = Footer::first(); // Ambil data footer
            $view->with('footer', $footer); // Kirim data footer ke view
        });
    }
}
