<?php

namespace App\Providers;

use App\Models\Kajian;
use App\Models\Masjid;
use App\Models\Ustadz;
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
