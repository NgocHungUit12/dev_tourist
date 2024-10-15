<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeReview extends Model
{
    use HasFactory;

    protected $fillable = ['review_id', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tourReview()
    {
        return $this->belongsTo(TourReview::class, 'review_id');
    }

}
