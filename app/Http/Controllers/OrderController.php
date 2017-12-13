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
    {//dd(request()->except('details'));
        $order = Order::create(request()->all());
        // $order->details()->create(request()->only('details'));

        return response([], 201);
    }
}
