<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Tour;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreGalleryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function store(StoreGalleryRequest $request, Tour $tour)
    {
        $file = $request->file('path');
        $file_name = $file->getClientOriginalName();
        $file->move(base_path('uploads'), $file_name);

        $gallery = new Gallery();
        $gallery->tour_id = $tour->id;
        $gallery->path = $file_name;
        $gallery->save();

        return redirect()->route('admin.tours.edit', $tour)->with('message', 'Added Successfully !');
    }

    public function edit( Tour $tour, Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('tour', 'gallery'));
    }

    public function update(StoreGalleryRequest $request, Tour $tour, Gallery $gallery)
    {
        if($request->path){
            File::delete('storage/' . $gallery->path);
        }

        $file = $request->file('path');
        $file_name = $file->getClientOriginalName();
        $file->move(base_path('uploads'), $file_name);

        $gallery->path = $file_name;
        $gallery->save();

        return redirect()->route('admin.tours.edit', $tour)->with('message', 'Updated Successfully !');
    }

    public function destroy( Tour $tour, Gallery $gallery): RedirectResponse
    {
        if($gallery->path){
            File::delete('storage/' . $gallery->path);
        }

        $gallery->delete();

        return redirect()->route('admin.tours.edit', $tour)->with('message', 'Deleted Successfully !');
    }
}
