<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Meal extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];

    protected $fillable = ['title','description','category_id','status'];

    public function category(){

        return $this->belongsTo('App\Models\Category');
    }

    public function ingredient(){

        //return $this->hasMany('App\Models\Ingredient','meals_id');

        return $this->belongsToMany('App\Models\Ingredient');
    }

    public function tag(){

        //return $this->hasMany('App\Models\Tag','meals_id');

        return $this->belongsToMany('App\Models\Tag');
    }

    public function language(){

        //return $this->belongsTo('App\Models\Language');

        return $this->belongsToMany('App\Models\Language');
    }
}
