<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function product_galleries(){
        return $this->hasMany(ProductGallery::class);
    }
    public function product_sizes(){
        return $this->hasMany(StoreSize::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
