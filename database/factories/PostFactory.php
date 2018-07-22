<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'         => $faker->word,
        'body'          => $faker->sentence,
        'image'         => $faker->imageUrl(690, 388),
        'category_id'   => rand(1, 3),
    ];
});
