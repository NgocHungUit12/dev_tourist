<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionCategory extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function provine_categories(){
        return $this->hasMany(ProvineCategory::class);
    }
    protected $fillable = [
        'category_id',
        'title',
        'description',
    ];
}
