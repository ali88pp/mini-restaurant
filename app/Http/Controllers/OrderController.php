<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $this->authorize('view order');
        
        return Order::with('details')->paginate();
    }

    public function store()
    {
        $this->authorize('create order');

        $order = Order::create(request()->all());
        $order->details()->createMany(
            collect(request()->only('details'))->collapse()->toArray()
        );

        return response([], 201);
    }
}
