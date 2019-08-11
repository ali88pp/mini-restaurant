<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
    public function index()
    {
        $this->authorize('view food');
        
        return Food::paginate();
    }

    public function store()
    {
        $this->authorize('create food');

        Food::create(request()->all());

        return response(null, 201);
    }

    public function update(Food $food)
    {
        $this->authorize('edit food');

        $food->update(request()->all());
    }
}
