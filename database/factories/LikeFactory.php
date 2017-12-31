<?php

use Faker\Generator as Faker;

$factory->define(App\Like::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,2),
        'publication_id' => rand(1,2)
    ];
});
