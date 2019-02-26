<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable; 

class Ingredient extends Model
{
    use Translatable;

    public $translatedAttributes = ['title','slug'];

    protected $fillable = ['title','slug'];

    public function meal()
    {
        return $this->belongsToMany('App\Models\Meal');
    }
}
