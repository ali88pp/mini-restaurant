<?php

use Faker\Generator as Faker;

$factory->define(App\Table::class, function (Faker $faker) {
    return [
        'no' => $faker->randomElement([1, 2, 3, 4, 5]),
        'status' => 1,
        'sale_id' => function() { return factory(App\Sale::class)->create}
    ];
});
