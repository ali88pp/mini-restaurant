<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('view role');

        return Role::paginate();
    }
    
    public function store()
    {
        $this->authorize('create role');
    
        Role::create(request()->only(['name']));

        return response()->json([], 201);
    }

    public function update(Role $role)
    {
        $this->authorize('update role');

        $role->update(request()->only(['name']));
    }
}
