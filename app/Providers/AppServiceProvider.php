<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\View\Composers\DefaultComposer;



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
        // إعداد اللغة العربية كمحلية افتراضية لـ Carbon
        Carbon::setLocale('ar');

//         adding bootstrap pagination
        Paginator::useBootstrap();

        View::composer(['default','results', 'profile.*', 'showTender',  'admin', 'admin.*', 'vendors', 'vendors.*', 'tenders', 'tenders.*', 'companies.*'], DefaultComposer::class);

    }
}
