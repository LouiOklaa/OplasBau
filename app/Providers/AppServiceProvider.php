<?php

namespace App\Providers;

use App\Models\EmailLog;
use App\Models\Gallery;
use App\Models\GeneralInformation;
use App\Models\Services;
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
            $services = Services::pluck('section_name')->unique();
            $projects = Gallery::pluck('section_name')->unique();

            $view->with([
                'information' => $information,
                'services_sections' => $services_sections,
                'services' => $services,
                'projects' => $projects,
            ]);
        });

        View::composer('layouts.master', function ($view) {
            $notifications = EmailLog::where('is_notified', false)->get();

            $view->with([
                'notifications' => $notifications,
            ]);
        });
    }


}
