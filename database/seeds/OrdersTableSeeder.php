<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\OrderDetail;
use App\Receipt;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Receipt::truncate();
        OrderDetail::truncate();
        Order::truncate();

        $orders = factory(Order::class, 2)->create();
        
        $orders->each(function($order) {
            factory(OrderDetail::class, 5)->create([ 'order_id' => $order->id ]);
        });

        $receipt = factory(Receipt::class)->create();

        $orders->each(function($order) use($receipt) {
            $receipt->orders()->attach($order->id);
        });
    }
}
