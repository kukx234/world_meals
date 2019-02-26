<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;
    
    public function meal()
    {
        return $this->belongsToMany('App\Models\Meal');
    }
}
