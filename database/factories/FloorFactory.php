<?php

use Faker\Generator as Faker;

$factory->define(App\Floor::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([1, 2, 3, 4, 5])
    ];
});
