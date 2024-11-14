<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GeneralInformation;
use App\Models\Services;
use App\Models\ServicesSections;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function index()
    {
        $information = GeneralInformation::first();
        $services = Services::all();
        $services_sections = ServicesSections::all();
        $projects = Gallery::all();
        return view('index' , compact('information' ,  'services' , 'services_sections' , 'projects'));
    }


    public function showServices(Request $request , $section_name = null)
    {

        if ($request->routeIs('show_services')){

            $section_name = str_replace('-', ' ', urldecode($section_name));
            $services = Services::where('section_name' , $section_name)->paginate(9);

            return view('Services.show_services', compact('services' , 'section_name'));

        }

        else{

            $services = Services::paginate(9);
            return view('Services.show_all_services', compact('services'));
        }

    }

    public function sortServices(Request $request)
    {
        $query = Services::query();

        if ($request->has('sectionName')) {
            $query->where('section_name' , $request->get('sectionName'));
        }

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $services = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $services->setCollection(
                match ($request->get('sort')) {
                    'nameA' => $services->getCollection()->sortBy('name'),
                    'nameZ' => $services->getCollection()->sortByDesc('name'),
                    'newest' => $services->getCollection()->sortByDesc('created_at'),
                    'oldest' => $services->getCollection()->sortBy('created_at'),
                    default => $services->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $services->appends($request->all());
        $html = view('Services.partials_services_list', compact('services'))->render();

        return response()->json(['html' => $html]);
    }

    public function sortAllServices(Request $request)
    {
        $query = Services::query();

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $services = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $services->setCollection(
                match ($request->get('sort')) {
                    'nameA' => $services->getCollection()->sortBy('name'),
                    'nameZ' => $services->getCollection()->sortByDesc('name'),
                    'newest' => $services->getCollection()->sortByDesc('created_at'),
                    'oldest' => $services->getCollection()->sortBy('created_at'),
                    default => $services->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $services->appends($request->all());
        $html = view('Services.partials_services_list', compact('services'))->render();

        return response()->json(['html' => $html]);
    }

    public function showProjects(Request $request , $section_name = null)
    {

        if ($request->routeIs('show_projects')){

            $section_name = str_replace('-', ' ', urldecode($section_name));
            $projects = Gallery::where('section_name' , $section_name)->paginate(9);

            return view('Gallery.show_projects', compact('projects' , 'section_name'));

        }

        else{

            $projects = Gallery::paginate(9);
            return view('Gallery.show_all_projects', compact('projects'));
        }

    }

    public function sortProjects(Request $request)
    {
        $query = Gallery::query();

        if ($request->has('sectionName')) {
            $query->where('section_name' , $request->get('sectionName'));
        }

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $projects = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $projects->setCollection(
                match ($request->get('sort')) {
                    'nameA' => $projects->getCollection()->sortBy('name'),
                    'nameZ' => $projects->getCollection()->sortByDesc('name'),
                    'newest' => $projects->getCollection()->sortByDesc('created_at'),
                    'oldest' => $projects->getCollection()->sortBy('created_at'),
                    default => $projects->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $projects->appends($request->all());
        $html = view('Gallery.partials_projects_list', compact('projects'))->render();

        return response()->json(['html' => $html]);
    }

    public function sortAllProjects(Request $request)
    {
        $query = Gallery::query();

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $projects = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $projects->setCollection(
                match ($request->get('sort')) {
                    'nameA' => $projects->getCollection()->sortBy('name'),
                    'nameZ' => $projects->getCollection()->sortByDesc('name'),
                    'newest' => $projects->getCollection()->sortByDesc('created_at'),
                    'oldest' => $projects->getCollection()->sortBy('created_at'),
                    default => $projects->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $projects->appends($request->all());
        $html = view('Gallery.partials_projects_list', compact('projects'))->render();

        return response()->json(['html' => $html]);
    }

}
