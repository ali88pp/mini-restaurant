@extends('_layout.master')
@section('content')
<div class="container">
  <h2>Item List</h2>
  <a href="{{ route('item.create') }}" class="btn btn-primary">New</a>
  <table class = "table">
    <thead>
      <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Remark</th>
        <th>Price</th>
        <th>Price</th>
        <th>Price</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->code }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->remark }}</td>
        <td>{{ $item->price['s']['usd'] }}={{ $item->price['s']['riel'] }}</td>
        <td>{{ $item->price['m']['usd'] }}={{ $item->price['m']['riel'] }}</td>
        <td>{{ $item->price['l']['usd'] }}={{ $item->price['l']['riel'] }}</td>
        <td>{{ $item->category->name }}</td>
        <td class="d-flex">
            <a href="{{ route('item.edit', [ 'id' => $item->id ]) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('item.destroy', [ 'id' => $item->id ]) }}" method="post">
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
