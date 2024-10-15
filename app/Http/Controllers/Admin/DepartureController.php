<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartureRequest;
use App\Models\Departure;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DepartureController extends Controller
{
    public function store(StoreDepartureRequest $request, Tour $tour)
    {

        Departure::create($request->validated());

        return redirect()->route('admin.tours.edit', $tour)->with('message', 'Added Successfully !');
    }

    public function edit( Tour $tour, Departure $departure)
    {
        return view('admin.departures.edit', compact('tour', 'departure'));
    }

    public function update(StoreDepartureRequest $request, Tour $tour, Departure $departure)
    {
        $departure->update($request->validated());

        return redirect()->route('admin.tours.edit', $tour)->with('message', 'Updated Successfully !');
    }

    public function destroy( Tour $tour, Departure $departure): RedirectResponse
    {

        $departure->delete();

        return redirect()->route('admin.tours.edit', $tour)->with('message', 'Deleted Successfully !');
    }
}
