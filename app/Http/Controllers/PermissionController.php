<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('view', Permission::class);

        return Permission::all();
    }

    public function store()
    {
        $this->authorize('create', Permission::class);

        Permission::create(request()->only(['name']));

        return response()->json([], 201);
    }
}
