<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
  public function index ()
  {
    return $orders = Order::all();

    //return view('order.index', compact('orders'));
  }


  public function create()
  {
    return view('order.create');
  }

  public function store(Request $request)
  {
    return Order::create($request->all());
    //return redirect()->route('order');
  }

  public function update(Request $request, $id)
  {
    $order = Order::where('id', $id)->first();
    $order->update($request->all());
    return $order;
    // return redirect()->route('customer');
  }

}
