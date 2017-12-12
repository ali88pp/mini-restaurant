<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\OrderDetail;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::truncate();
        Order::truncate();

        factory(Order::class, 30)->create()->each(function($order) {
            factory(OrderDetail::class, 5)->create([ 'order_id' => $order->id ]);
        });
    }
}
