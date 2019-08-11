<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beverage;

class BeverageController extends Controller
{
    public function index()
    {
        $this->authorize('view beverage');
        
        return Beverage::paginate();
    }

    public function store()
    {
        $this->authorize('create beverage');

        Beverage::create(request()->all());

        return response(null, 201);
    }

    public function update(Beverage $beverage)
    {
        $this->authorize('edit beverage');

        $beverage->update(request()->all());
    }
}
