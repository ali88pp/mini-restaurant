@extends('_layout.master')
@section('content')
<div class="container">
  <h2>Customer List</h2>
  <a href="{{ route('customer.create') }}" class="btn btn-primary">New</a>
  <table class = "table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Code</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Point</th>
    </thead>
    <tbody>
      @foreach($customers as $customer)
      <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->code }}</td>
        <td>{{ $customer->contact }}</td>
        <td>{{ $customer->address }}</td>
        <td>{{ $customer->point }}</td>
        <td class="d-flex">
            <a href="{{ route('customer.edit', [ 'id' => $customer->id ]) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('customer.destroy', [ 'id' => $customer->id ]) }}" method="post">
              {!! csrf_field() !!}
              {!! method_field('delete') !!}
              <button class="btn btn-danger">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop()
