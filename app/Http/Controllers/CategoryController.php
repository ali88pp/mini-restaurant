<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  public function index()
  {
     $categories = Category::all();
     return $categories;
    //  return view('category.index', compact('categories'));
  }

  public function create()
  {

    // return view('category.create');
  }

  public function store(Request $request)
  {
     return Category::create($request->all());

     //return redirect()->route('category');
  }

  public function show($id)
  {
    $category = Category::where('id', $id)->first();

    return view('$category.show', compact('category'));
  }

  public function edit($id)
  {
    $category = Category::where('id', $id)->first();

    //return view('category.edit', compact('category'));
  }

  public function update(Request $request, $id)
  {
    $category = Category::where('id', $id)->first();
    $category->update($request->all());
    return $category;
    //return redirect()->route('category');
  }

  public function destroy($id)
  {
    $category = Category::where('id', $id)->first();
    $category->delete();

    return redirect()->route('category');
  }

}
