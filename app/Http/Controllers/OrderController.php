<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index ()
  {
    $orders = Order::all();
    return view('order.index', compact('items'));
  }


  public function create()
  {
  $categories = Category::all();
  return view('item.create', compact('categories'));
  }

  public function store(Request $request)
  {
  $this->validate($request, [
    'price.*.*' => 'required|numeric',
    'name' => 'required',
    'category_id' => 'required|numeric'
  ]);

  Item::create($request->all());
  return redirect()->route('item');

  }
}
