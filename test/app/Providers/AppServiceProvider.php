<?php

namespace App\Providers;

use App\city;
use App\CourseType;
use Illuminate\Support\ServiceProvider;
use App\generalSetting as generalSetting;
use App\leads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
        Schema::defaultStringLength(191);
//
    }
}
