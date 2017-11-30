<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('view permission');        

        return Permission::paginate();
    }

    public function store()
    {
        $this->authorize('create permission');

        Permission::create(request()->only(['name']));

        return response()->json([], 201);
    }

    public function update(Permission $permission)
    {
        $this->authorize('edit permission');

        $permission->update(request()->only('name'));
    }
}
