<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    static $password;

    return [
        'category_name' => $faker->randomElement([ 'Sea Food','Drink', 'Soup' ]),
        'sort' => 0
    ];
});

$factory->define(App\Item::class, function (Faker $faker) {
    static $password;

    return [
        'code' => str_random(4),
    	'name' => $faker->randomElement([ 'Beef','Chicken' ]),
    	'remark' => null,
    	'price' => json_encode([ 'S' => 1 , 'M' => 2, 'L' => 3]),
    	'category_id' => function () { return factory(App\Category::class)->create()->id; },
    ];
});
