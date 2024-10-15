<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvineCategory extends Model
{
    use HasFactory;

    public function regioncategory(){
        return $this->belongsTo(RegionCategory::class);
    }

    public function tours(){
        return $this->hasMany(Tour::class);
    }

    protected $fillable = [
        'region_category_id',
        'title',
        'description',
    ];
}
