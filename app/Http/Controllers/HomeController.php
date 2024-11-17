<?php

namespace App\Http\Controllers;

use App\Models\EmailLog;
use App\Models\Gallery;
use App\Models\Services;
use App\Models\ServicesSections;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Armaturenbrett|Statistiken', ['only' => ['index']]);

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $servicesCount = Services::count();
        $projectsCount = Gallery::count();
        $servicesSectionsCount = ServicesSections::count();

        $latestEmails = EmailLog::latest()->take(4)->get();

        return view('dashboard.dashboard' , compact('servicesCount', 'projectsCount', 'servicesSectionsCount' , 'latestEmails'));
    }
}
