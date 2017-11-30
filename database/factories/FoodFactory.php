<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'code' => str_random(10),
        'name' => $faker->randomElement([ 'Thai Boat', 'Inside Pork Noodle', 'Beef Stew']),
        'description' => $faker->sentence(),
        'cost' => $faker->numberBetween(1, 100),
        'price' => $faker->numberBetween(1, 100),
        'category_id' => 1,
        'image_uri' => null,
        'is_available' => true,
    ];
});
