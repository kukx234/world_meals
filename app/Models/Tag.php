<?php

namespace App\Models;

use Dimsav\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    public $translatedAttributes = ['title'];

    protected $fillable = ['title','slug'];
    
    public function meal(){

        //return $this->belongsTo('App\Models\Meal');

        return $this->belongsToMany('App\Models\Meal');
    }

}
