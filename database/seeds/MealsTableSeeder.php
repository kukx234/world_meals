<?php

use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Tag;
use App\Models\Language;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App::setLocale('en');
        factory(App\Models\Meal::class,50)->create()->each(function($meal){

            $tags = range(1,10);
            $ingredients = range(1,30);

            shuffle($tags);
            shuffle($ingredients);

            $tag_ids = array_slice($tags,0,2);
            $ingredient_ids = array_slice($ingredients,0,4);

            $meal->tag()->attach($tag_ids);
            $meal->ingredient()->attach($ingredient_ids);
        });

    }


}
