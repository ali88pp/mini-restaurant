<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\Gate;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('view permission');        

        return Permission::all();
    }

    public function store()
    {
        $this->authorize('create permission');

        Permission::create(request()->only(['name']));

        return response()->json([], 201);
    }
}
