<?php

namespace App\Http\Controllers;

use App\Classes\Filter;
use App\Http\Requests\MealRequest;

class MealsController extends Controller
{
    public function index(MealRequest $request)
    {

        $tagId = $request->get('tag');
        
        $with = $request->get('with');
        
        $category = $request->get('category');

        $perPage = $request->get('per_page', 10);

        $filter = new Filter($tagId,$category,$with,$perPage);

        return $filter->filterMeals();

    }


}
