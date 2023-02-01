<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    public $timestamps = false;
    
    
    use HasFactory;

    public function tv_shows(){
        return $this->hasMany(TVShow::class);
    }
}
