<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LikeReview;
use Illuminate\Http\Request;
use App\Models\TourReview;
use App\Models\Tour;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Departure;

class TourReviewController extends Controller
{
    public function index(){
        $reviews = TourReview::get();
        
        return view('admin.reviews.index', compact('reviews'));
    }

    public function edit(TourReview $review){
       
        return view('admin.reviews.edit', compact('review'));
    }
    public function update(Request $request,TourReview $review) 
    {
        DB::table('tour_reviews')->where('id', $review->id)->update(['status'=>$request['status']]);

        return redirect()->route('admin.reviews.index')->with('message', 'Updated Successfully !');
    }
    public function user_store_review(Request $request, Tour $tour){
        if(Auth::check()){
            $user = auth()->user();
            $review = new TourReview();

            $review->tour_id = $tour->id;
            $review->user_id = $user->id;
            $review->rate = $request['rate'];
            $review->review = $request['review'];
            $review['status']='active';
          
            $review->created_at = Carbon::now();
            $review->save();

            $reviews  = TourReview::get();
            $users = User::get();

            $replies = TourReview::whereNotNull('parent_id')->get();
            $departure = Departure::where('tour_id', $tour->id)->first();
            return redirect()->route('detail', compact('tour', 'reviews','users', 'replies', 'departure'));

        }
        else {
            return view('auth.login');
        }
        
        
    }
    
    public function reply_review(Request $request, TourReview $rev){
        if(Auth::check()){
            $user = auth()->user();
            $review = new TourReview();

            $review->parent_id = $request['parent_id'];
            $review->user_id = $user->id;
            $review->review = $request['review'];
            $review['status']='active';

            $review->created_at = Carbon::now();
            $review->save();
            $reviews  = TourReview::get();
            $users = User::get();

            $tour = Tour::where('id', $request['tour_id'])->first();
            $departure = Departure::where('tour_id', $tour->id)->first();

            return redirect()->route('detail', compact('tour', 'reviews','users','departure'));

        }
    }

    private function deleteReviewAndChildren($reviewId) {
        LikeReview::where('review_id', $reviewId)->delete();
    
       
        $childReviews = TourReview::where('parent_id', $reviewId)->get();
        foreach ($childReviews as $childReview) {
            $this->deleteReviewAndChildren($childReview->id);
        }
        TourReview::where('id', $reviewId)->delete();
    }
    public function destroy(TourReview $review)
    {
        
        $this->deleteReviewAndChildren($review->id);

        return redirect()->route('admin.reviews.index')->with('message', 'Deleted Successfully !');
    }
    
    

    public function delete(TourReview $review)
    {
        $this->deleteReviewAndChildren($review->id);

        
        return redirect()->back()->with('message', 'Deleted Successfully !');
    }

}
