<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $menu = [
            (object) ['role' => 'admin', 'link' => 'index', 'title' => 'Dashboard', 'icon' => 'fa-brands fa-delicious'],
            (object) ['role' => 'admin', 'link' => 'riwayat-kesehatan', 'title' => 'Riwayat Kesehatan', 'icon' => 'fa-solid fa-book-medical'],
            (object) ['role' => 'pasien', 'link' => 'index', 'title' => 'Riwayat Kesehatan', 'icon' => 'fa-solid fa-book-medical'],
            (object) ['role' => 'dokter', 'link' => 'index', 'title' => 'Dashboard', 'icon' => 'fa-solid fa-book-medical'],
        ];
    
        View::share('menu', $menu);
    }
}
