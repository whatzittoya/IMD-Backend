<?php

namespace App\Providers;

use App\Models\Kajian;
use App\Models\Masjid;
use App\Models\Ustadz;
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // Masjid::observe(PostObserver::class);
        // Ustadz::observe(PostObserver::class);
        // Kajian::observe(PostObserver::class);
        Schema::defaultStringLength(191);
    }
}
