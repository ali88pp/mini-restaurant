<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Order::class, function (Faker $faker) {
    
    $user = factory(App\User::class)->create();

    return [
        'code' => str_random(10),
        'date_time' => Carbon::now(),
        'queue' => random_int(1, 100),
        'table' => random_int(1, 100),
        'amount' => random_int(1, 500),
        'status' => 1,
        'created_by' => $user->username,
        'updated_by' => $user->username,
    ];
});
