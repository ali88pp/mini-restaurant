<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Floor;

class FloorController extends Controller
{
    public function index()
    {
       $floors = Floor::all();

       return view('floor.index', compact('floors'));
    }

    public function create()
    {
      return view('floor.create');
    }

    public function store(Request $request)
    {
       Floor::create($request->all());
    }

    public function show($id)
    {
      $floor = Floor::where('id', $id)->first();

      return view('floor.show', compact('floor'));
    }

    public function edit($id)
    {
      $floor = Floor::where('id', $id)->first();

      return view('floor.edit', compact('floor'));
    }

    public function update(Request $request, $id)
    {
      $floor = Floor::where('id', $id)->first();
      $floor->update($request->all());
    }

    public function destroy($id)
    {
      $floor = Floor::where('id', $id)->first();

       $floor->delete();
    }
}
