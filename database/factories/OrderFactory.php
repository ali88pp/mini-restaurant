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


$factory->define(App\OrderDetail::class, function (Faker $faker) {
    
    $food = factory(App\Food::class)->create();

    return [
        'order_id' => function() { return factory(App\Order::class)->create()->id; },
        'item_id' => $food->id,
        'item_name' => $food->name,
        'item_type' => App\Food::class,
        'quantity' => random_int(1, 10),
        'unit_price' => $food->price,
    ];
});


$factory->define(App\OrderReceipt::class, function (Faker $faker) {
    return [
        'order_id' => function() { return factory(App\Order::class)->create()->id; },
        'receipt_id' => function() { return factory(App\Receipt::class)->create()->id; },
    ];
});


$factory->define(App\Receipt::class, function (Faker $faker) {
    
    $user = factory(App\User::class)->create();

    return [
        'code' => str_random(10),
        'date_time' => Carbon::now(),
        'amount' => 500,
        'received_usd' => 500,
        'received_riel' => 0,
        'changed_usd' => 0,
        'changed_riel' => 0,
        'created_by' => $user->username,
        'updated_by' => $user->username,
    ];
});
