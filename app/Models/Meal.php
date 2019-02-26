<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Meal extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];

    protected $fillable = ['title','description','category_id','status'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function ingredient()
    {
        return $this->belongsToMany('App\Models\Ingredient');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function language()
    {
        return $this->belongsToMany('App\Models\Language');
    }

    public function scopeOfCategory($query,$category = null)
    {
        if($category){
            if($category === "null") {
                return $query->whereNull('category_id');
            }
            else if($category === "!null") {
                return  $query->whereNotNull('category_id');
            }
            else {
                return $query->where('category_id',$category);
            }
        }
        return $query;
    }
    
}
