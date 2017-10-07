<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use App\Floor;

class TableController extends Controller
{
  public function index()
  {
     $tables = Table::all();
     return view('table.index', compact('tables'));
  }

  public function create()
  {
    $floors = Floor::all();
    return view('table.create', compact('floors'));
  }

  public function store(Request $request)
  {
    Table::create($request->all());

    return redirect()->route('table');
  }

  public function edit($id)
  {
    $table = Table::where('no', $id)->first();
    $floors = Floor::all();

    return view('table.edit', compact('table','floors'));
  }

  public function update(Request $request, $id)
  {
    $table= Table::where('no', $id)->first();
    $table->update($request->all());

    return redirect()->route('table');
  }

  public function show($id)
  {
    $table = Table::where('no', $id)->first();

    return view('table.show', compact('table'));
  }

  public function destroy($id)
  {
    $table = Table::where('no', $id)->first();
    $table->delete();

    return redirect()->route('table');
  }


}
