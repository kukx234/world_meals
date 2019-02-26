<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Support\Facades\Input;
use App\Http\Resources\Meal as MealResource;
use App\Http\Resources\MealCollection;
use App\Http\Requests\MealRequest;

class MealsController extends Controller
{
    public function index(MealRequest $request)
    {

        $tagId = $request->get('tag');
        if ($tagId) {
            $tagId = explode(',', $tagId);
        }

        $lang = $request->get('lang');

        $with = $request->get('with', []);
        if (!empty($with)) {
            $with = explode(',', $with);
        }

        $category = $request->get('category');

        $perPage = $request->get('per_page', 10);


        $meals = Meal::when(!empty($with), function($query) use ($with)
        {
            $query->with($with); 
        })
        ->ofCategory($category)
        ->whereHas('tag', function($query) use ($tagId)
        {
            if (!empty($tagId)) {
                $query->whereIn('id',$tagId);
            }
        })
        ->paginate($perPage);

        return  new MealCollection($meals);
      
    }

    
}
