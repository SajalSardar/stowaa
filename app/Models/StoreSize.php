<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSize extends Model
{
    use HasFactory;

    public function sizes(){
        return $this->hasMany(Productsize::class, 'id','productsize_id');
    }

    
}
