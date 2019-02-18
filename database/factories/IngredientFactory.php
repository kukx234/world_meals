<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Ingredient::class, function (Faker $faker) {
    return [
        'title:en' => $faker->word,
        'title:hr' => $faker->word,
        'slug' => $faker->slug,
    ];
});
