<?php

namespace App\Providers;

use App\Models\GeneralInformation;
use App\Models\ServicesSections;
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
        View::composer('layouts.master_home_page', function ($view) {
            $information = GeneralInformation::first();
            $services_sections = ServicesSections::all();

            $view->with([
                'information' => $information,
                'services_sections' => $services_sections,
            ]);
        });
    }
}
