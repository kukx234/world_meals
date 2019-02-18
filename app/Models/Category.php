<?php

namespace App\Models;

use Dimsav\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Translatable;

    public $translatedAttributes = ['title'];

    protected $fillable = ['title','slug'];

    public function meal(){

        return $this->hasMany('App\Models\Meal');
    }
}
