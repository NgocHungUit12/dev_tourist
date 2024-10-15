<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function departures(){
        return $this->hasMany(Departure::class);
    }

    public function getNearestDepartureAttribute()
    {
        return $this->departures()
                    ->where('departure_day', '>=', now())
                    ->orderBy('departure_day', 'asc')
                    ->first();
    }

    public function provine_category(){
        return $this->belongsTo(ProvineCategory::class);
    }

    protected $fillable = [
        'name',
        'location',
        'duration',
        'location_start',
        'vehical',
        'hotel',
        'description',
        'provine_category_id',
        'user_id',
    ];
}
