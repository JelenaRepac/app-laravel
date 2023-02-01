<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenter extends Model
{
    public $timestamps = false;
    
    use HasFactory;

    public function tvshows(){
        return $shows = $this->hasMany(TVShow::class);
    }
}
