<?php

namespace App\Models;

use Dimsav\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    public $translatedAttributes = ['title','slug'];

    protected $fillable = ['title','slug'];
    
    public function meal()
    {
        return $this->belongsToMany('App\Models\Meal');
    }

}
