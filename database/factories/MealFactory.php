<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Meal::class, function (Faker $faker) {
    return [
        
        'title:en' => $faker->word,
        'description:en' => $faker->text,
        
        'title:hr' => $faker->word,
        'description:hr' => $faker->text,
        
        'status' => $faker->numberBetween(0,3),
        'category_id' => $faker->numberBetween(1,10),
    ];
});
