<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenter extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    use HasFactory;

    public function tvshows(){
        return $shows = $this->hasMany(TVShow::class);
    }
}
