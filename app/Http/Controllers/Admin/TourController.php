<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Tour;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Models\Departure;
use App\Models\ProvineCategory;
use App\Models\TourReview;
use App\Models\LikeReview;
use App\Models\Gallery;

class TourController extends Controller
{

    public function index() : View
    {
        $tours = Tour::get();

        return view('admin.tours.index', compact('tours'));
    }

    public function create(): View
    {
        $provine_categories = ProvineCategory::get();

        return view('admin.tours.create', compact('provine_categories'));
    }

    public function store(StoreTourRequest $request): RedirectResponse
    {
        $slug = Str::slug($request->name);        
        Tour::create($request->validated());

        return redirect()->route('admin.tours.index')->with('message', 'Added Successfully !');
    }

    public function edit(Tour $tour)
    {
        $provine_categories = ProvineCategory::get();

        return view('admin.tours.edit', compact('tour', 'provine_categories'));
    }

    public function update(UpdateTourRequest $request, Tour $Tour)
    {
        $slug = Str::slug($request->name);
        $Tour->update($request->validated() + ["slug" => $slug]);

        return redirect()->route('admin.tours.index')->with('message', 'Updated Successfully !');;
    }
    private function deleteReviewAndChildren($reviewId) {
        LikeReview::where('review_id', $reviewId)->delete();
    
       
        $childReviews = TourReview::where('parent_id', $reviewId)->get();
        foreach ($childReviews as $childReview) {
            $this->deleteReviewAndChildren($childReview->id);
        }
        TourReview::where('id', $reviewId)->delete();
    }

    public function destroy(Tour $Tour): RedirectResponse
    {
        $review = TourReview::where('tour_id', $Tour->id)->first();
        if($review){
            $this->deleteReviewAndChildren($review->id);
        }
        

        Gallery::where('tour_id', $Tour->id)->delete();
        
        Departure::where('tour_id', $Tour->id)->delete();
        
        $Tour->delete();

        return redirect()->route('admin.tours.index')->with('message', 'Deleted Successfully');
    }
}
