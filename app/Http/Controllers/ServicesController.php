<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\ServicesSections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = ServicesSections::all();
        $services = Services::all();
        return view('Services.services' , compact('sections' , 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([

            'name' => 'required',
            'section_id' => 'required',
            'image' => 'required',

        ],[

            'name.required' =>'Bitte geben Sie den Handynamen ein',
            'section_id.required' =>'Bitte wählen Sie den Abschnitt aus',
            'image.required' =>'Bitte geben Sie den Foto an',


        ]);

        $section_name = ServicesSections::where('id' , $request->section_id)->first()->name;

        $img = $request->file('image');
        $file_name = rand() . '.' . $img->getClientOriginalExtension();

        Services::create([

            'name' => $request->name,
            'section_id' => $request->section_id,
            'section_name' => $section_name,
            'note' => $request->note,
            'image' => $file_name,
            'created_by' => auth()->id(),

        ]);

        // Move Files
        $request->image->move(public_path('Attachments/Services'), $file_name);

        session()->flash('Add' , 'Das Dienstleistungen wurde erfolgreich hinzugefügt');
        return redirect('/dienstleistungen');
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate($request, [

            'section_name' => 'required',
        ], [


            'section_name.required' => 'Bitte wählen Sie den Abschnitt aus',

        ]);

        $id = ServicesSections::where('name' , $request->section_name)->first()->id;
        $section_name = ServicesSections::where('name' , $request->section_name)->first()->name;


        $services = Services::findOrFail($request->id);

        $services->update([
            'name' => $request->name,
            'section_id' => $id,
            'section_name' => $section_name,
            'note' => $request->note,
        ]);

        if ($request->hasFile('image')){

            Storage::disk('public_services')->delete($services->image);

            $img = $request->file('image');
            $file_name = rand() . '.' . $img->getClientOriginalExtension();
            $services->image = $file_name;
            $services->save();

            // Move File
            $request->image->move(public_path('Attachments/Services'), $file_name);
        }

        session()->flash('Edit','Des Dienstleistungen wurde erflogreich geänderts');
        return redirect('/dienstleistungen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $image = Services::where('id' , $request->id)->first()->image;
        $services = Services::findOrFail($request->id);
        $services->delete();

        Storage::disk('public_services')->delete($image);

        session()->flash('Delete','Das Dienstleistungen wurde erflogreich gelöscht');
        return back();
    }
}