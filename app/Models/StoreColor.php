<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreColor extends Model
{
    use HasFactory;

    public function colors(){
        return $this->hasMany(Productcolor::class, 'id','productsize_id');
    }


}
