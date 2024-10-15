<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TourReview extends Model
{
    use HasFactory;

    public function replies()
    {
        return $this->hasMany(TourReview::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parentReview()
    {
        return $this->belongsTo(TourReview::class, 'parent_id');
    }

    public function getTotalRepliesCountAttribute()
    {
        $count = $this->replies->count();

        foreach ($this->replies as $reply) {
            $count += $reply->totalRepliesCount;
        }

        return $count;
    }

    public function likes()
    {
        return $this->hasMany(LikeReview::class);
    }

    public function getLikesCountAttribute()
    {
        return LikeReview::where('review_id', $this->id)->count();
    }

    public function getIsLikedAttribute()
    {
        return LikeReview::where('review_id', $this->id)
                         ->where('user_id', Auth::id())
                         ->exists();
    }

    public function getIsUserCommentAttribute()
    {
        return $this->user_id === Auth::id();
    }
}
