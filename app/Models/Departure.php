<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    use HasFactory;
    public function tour(){
        return $this->belongsTo(Tour::class);
    }

    protected $fillable = [
        'tour_id',
        'adult',
        'children_6_11',
        'children_6',
        'departure_day',
        'quantity',
    ];
}
