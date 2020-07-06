<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Sitesetting;

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
        if(\Request::segment(1) =='admins')
        {
        }
        else
        {
            $appsetting = Sitesetting::first();

            view()->share(compact('appsetting'));
        }
    }
}
