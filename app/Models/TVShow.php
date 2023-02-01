<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVShow extends Model
{
   

    use HasFactory;

    public function studio(){
        return $this->belongsTo(Studio::class);
    }

    public function presenter(){
        return $this->belongsTo(Presenter::class);
    }
}
