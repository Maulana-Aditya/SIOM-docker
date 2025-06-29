<?php

namespace App\Providers;

use App\Models\Pengaturan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    $pengaturan = Pengaturan::first();
    // Cegah null di-share
    if (!$pengaturan) {
        $pengaturan = new \stdClass(); // Objek kosong
        $pengaturan->logo = null;
        $pengaturan->name = config('app.name');
    }

    View::share('pengaturan', $pengaturan);
    }
}
