<?php

namespace App\Classes;

use App\Models\Meal;
use App\Http\Resources\MealCollection;

class Filter
{
    private $tagId;
    private $category;
    private $with;
    private $perPage;

    public function __construct($tagId,$category,$with,$perPage)
    {
        $this->tagId = $tagId;
        $this->category = $category;
        $this->with = $with;
        $this->perPage = $perPage;
    }

    public function filterMeals()
    {
        if ($this->tagId) {
            $this->tagId = explode(',', $this->tagId);
        }

        if (!empty($this->with)) {
            $this->with = explode(',', $this->with);
        }

        $withwith= $this->with;
        $tagIdid = $this->tagId;

        $meals = Meal::when(!empty($this->with), function($query) use($withwith)
        {
            $query->with($this->with);
        })
        ->ofCategory($this->category)
        ->whereHas('tag', function($query) use ($tagIdid)
        {
            if (!empty($tagIdid)) {
                $query->whereIn('id',$tagIdid);
            }
        })
        ->paginate($this->perPage);

        return  new MealCollection($meals);
    }
}