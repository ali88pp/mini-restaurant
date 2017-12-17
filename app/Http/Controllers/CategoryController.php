<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // $this->authorize('view category');

        return Category::paginate();
    }

    public function store()
    {
        $this->authorize('create category');

        $this->validate(request(), [ 'name' => 'required', 'code' => 'required']);

        Category::create(request()->all());

        return response(null, 201);
    }

    public function update(Category $category)
    {
        $this->authorize('edit category');

        $this->validate(request(), [ 'name' => 'required', 'code' => 'required']);

        return $category->update(request()->all()) ? $category : false;
    }
}
