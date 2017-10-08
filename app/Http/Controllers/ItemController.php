<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class ItemController extends Controller
{
    public function index ()
    {
        return $items = Item::with('category')->get();
        // return view('item.index', compact('items'));
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

      return Item::create($request->all());
      // return redirect()->route('item');

    }

    public function edit($id){

      $item = Item::where('id' , $id)->first();
      $categories = Category::all();

      return view('item.edit', compact('item','categories'));

    }

    public function update(Request $request)
    {

      $item = Item::find($request->id);

      $item->update($request->all());

      return $item;

      //return redirect()->route('item');

    }

    public function destroy($id)
    {
      $item = Item::find($id);

      $item->delete();

      return redirect()->route('item');
    }

}
