<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Support\Facades\Input;

class MealsController extends Controller
{
    public function index(Request $request){

    $tag_id = $request->get('tag');
    if($tag_id){
        $tag_id = explode(',',$tag_id);
    }

    $lang = $request->get('lang');
   
    $with = $request->get('with', []);
    if(!empty($with)){
        $with = explode(',',$with);
    }

    $category = $request->get('category');

    $per_page = $request->get('per_page', 10);

 
            $meals = Meal::when(!empty($with),function($query)use($with){
                $query->with($with);
            })->when($category !== null , function($query) use($category){
                if($category === "null"){
                    $query->whereNull('category_id');
                }
                else if($category === "!null"){
                    $query->whereNotNull('category_id');
                }
                else{
                    $query->where('category_id',$category);
                }
            })->whereHas('tag',function($query)use($tag_id){

                if(!empty($tag_id)){
                    $query->whereIn('id',$tag_id);
                }
            })->paginate($per_page);


            
            $results = [];

            foreach ($meals->items() as $meal) {
                
                $result = array_merge(['status'=> $meal->status,$meal->translate($lang)]);



                if (in_array('tag', $with)) {
                    $tags = [];
                    foreach ($meal->tag as $tag) {

                        $tags[] = array_merge([ 'slug' => $tag->slug, $tag->translate($lang) ]);
                    }
                    $result['tags'] = $tags ;
                }



                if (in_array('ingredient', $with)) {
                    $ingredients = [];
                    foreach ($meal->ingredient as $ingredient) {

                        $ingredients[] = array_merge([ 'slug' => $ingredient->slug, $ingredient->translate($lang) ]);
                    }
                    $result['ingredients'] = $ingredients ;
                }

               


                if (in_array('category', $with) && $meal->category) {

                    $result['category'] = array_merge([ 'slug' => $meal->category->slug, $meal->category->translate($lang) ]);
                }


                $results[] = $result;
            }

       return [ 
           'meta'=> [
              'currentPage' => $meals->currentPage(),
              'totalItems' => $meals->total(),
              'itemsPerPage' => $meals->perPage(),
              'totalPages' => $meals->lastPage(),
           ],
           'data' => $results
        ];
    }

    
}
