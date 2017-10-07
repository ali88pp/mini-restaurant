<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
       $customers = Customer::all();

       return view('customer.index', compact('customers'));
    }

    public function create()
    {
      return view('customer.create');
    }

    public function store(Request $request)
    {
       Customer::create($request->all());

       return redirect()->route('customer');
    }

    public function show($id)
    {
      $customer = customer::where('id', $id)->first();

      return view('$customer.show', compact('customer'));
    }

    public function edit($id)
    {
      $customer = customer::where('id', $id)->first();

      return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
      $customer = customer::where('id', $id)->first();
      $customer->update($request->all());

      return redirect()->route('customer');
    }

    public function destroy($id)
    {
      $customer = customer::where('id', $id)->first();
      $customer->delete();

      return redirect()->route('customer');
    }
}
