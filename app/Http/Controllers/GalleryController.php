<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\ServicesSections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = gallery::paginate(6);
        $sections = ServicesSections::all();
        return view('Gallery.gallery' , compact('projects' , 'sections'));
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

            'name' => 'required|unique:galleries',
            'media' => 'required|file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,mkv|max:25600',
            'section_id' => 'required',

        ],[

            'name.required' =>'Bitte geben Sie den Projektnamen ein',
            'name.unique' =>'Dieses Projekt existiert bereits',
            'media.required' =>'Bitte geben Sie ein Foto oder Video des Projekt eni',
            'media.file' =>'Die Datei muss ein Foto oder Video sein',
            'media.mimes' =>'Die Datei muss vom Typ jpeg,png,jpg,mp4,mov,mkv sein',
            'media.max' =>'Die Datei darf nicht größer als 25 Megabytes sein.',
            'section_id.required' =>'Bitte wählen Sie den Abschnitt aus',

        ]);

        $section_name = ServicesSections::where('id' , $request->section_id)->first()->name;

        $media = $request->file('media');
        $file_name = rand() . '.' . $media->getClientOriginalExtension();

        gallery::create([

            'name' => $request->name,
            'section_id' => $request->section_id,
            'section_name' => $section_name,
            'note' => $request->note,
            'media' => $file_name,
            'created_by' => auth()->id(),

        ]);

        // Move Files
        $request->media->move(public_path('Attachments/Galerie'), $file_name);

        session()->flash('Add' , 'Das Projekt wurde erfolgreich hinzugefügt');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $validatedData=$request->validate([

            'name' => 'required|unique:galleries,name,'.$id,
            'media' => 'file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,mkv|max:25600',
            'section_name' => 'required',

        ],[

            'name.required' =>'Bitte geben Sie den Projektnamen ein',
            'name.unique' =>'Dieses Projekt existiert bereits',
            'media.file' =>'Die Datei muss ein Foto oder Video sein',
            'media.mimes' =>'Die Datei muss vom Typ jpeg,png,jpg,mp4,mov,mkv sein',
            'media.max' =>'Die Datei darf nicht größer als 25 Megabytes sein.',
            'section_name.required' => 'Bitte wählen Sie den Abschnitt aus',

        ]);

        $id = ServicesSections::where('name' , $request->section_name)->first()->id;
        $section_name = ServicesSections::where('name' , $request->section_name)->first()->name;

        $projects = gallery::findOrFail($request->id);

        $projects->update([
            'name' => $request->name,
            'section_id' => $id,
            'section_name' => $section_name,
            'note' => $request->note,
        ]);

        if ($request->hasFile('media')){

            Storage::disk('public_gallery')->delete($projects->media);

            $img = $request->file('media');
            $file_name = rand() . '.' . $img->getClientOriginalExtension();
            $projects->media = $file_name;
            $projects->save();

            // Move File
            $request->media->move(public_path('Attachments/Galerie'), $file_name);
        }

        session()->flash('Edit' , 'Des Projekt wurde erfolgreich geändert');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $media = gallery::where('id' , $request->id)->first()->media;

        gallery::findOrFail($id)->delete();

        Storage::disk('public_gallery')->delete($media);

        session()->flash('Delete','Das Projekt wurde erfolgreich gelöscht');
        return back();
    }
}
