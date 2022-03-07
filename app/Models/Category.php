<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'description',
        'image',
        'status',
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    /**
     * Show Childe category.
     */
    public function chiedls()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function scopeParent($query)
    {
        $query->where('parent_id', null);
    }

    public function scopeParentWithChild($query)
    {
        $query->with('chiedls')->where('parent_id', null);
    }

    public function scopeChild($query)
    {
        $query->where('parent_id', '!=', null);
    }

    public function scopeChildWithParent($query)
    {
        $query->with('parent')->where('parent_id', '!=', null);
    }
}
