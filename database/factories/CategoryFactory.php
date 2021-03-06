<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'title:en' => $faker->name,
        'title:hr' => $faker->name,
        'slug:en' => $faker->slug,
        'slug:hr' => $faker->slug,
    ];
});
