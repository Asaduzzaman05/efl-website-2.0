<?php

namespace App\Providers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Management;
use App\Models\SubCategory;
use App\Models\CompanyProfile;
use App\Models\SolutionCategory;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // dd(CompanyProfile::first());
       view()->share('content', CompanyProfile::first());
    }
}
