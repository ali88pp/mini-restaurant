<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'code' => str_random(10),
        'name' => $faker->name(),
        'image_uri' => null,
    ];
});

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'category_id' => function() { return factory(App\Category::class)->create()->id; },
        'code' => str_random(10),
        'name' => $faker->randomElement([ 'Thai Boat', 'Inside Pork Noodle', 'Beef Stew']),
        'description' => $faker->sentence(),
        'cost' => $faker->numberBetween(1, 100),
        'price' => $faker->numberBetween(1, 100),
        'image_uri' => null,
        'is_available' => true,
    ];
});
