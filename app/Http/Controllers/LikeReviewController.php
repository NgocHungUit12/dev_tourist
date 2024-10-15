<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LikeReview;
use Illuminate\Support\Facades\Auth;

class LikeReviewController extends Controller
{
    
    public function toggleLike(Request $request)
    {
        $userId = Auth::id(); 
        $reviewId = $request->review_id; 

        $like = LikeReview::where('user_id', $userId)->where('review_id', $reviewId)->first();

        if ($like) {
            
            $like->delete();
            $likedStatus = false;
        } else {
            
            LikeReview::create([
                'user_id' => $userId,
                'review_id' => $reviewId
            ]);
            $likedStatus = true;
        }

        $likesCount = LikeReview::where('review_id', $reviewId)->count();

        return response()->json([
            'liked' => $likedStatus,
            'likesCount' => $likesCount
        ]);

    }
}


