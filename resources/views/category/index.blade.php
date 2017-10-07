@extends('_layout.master')
@section('content')
<div class="container">
  <h2>Category List</h2>
  <a href="{{ route('category.create') }}" class="btn btn-primary">New</a>
  <table class = "table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Sort</th>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->sort }}</td>
        <td class="d-flex">
            <a href="{{ route('category.edit', [ 'id' => $category->id ]) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('category.destroy', [ 'id' => $category->id ]) }}" method="post">
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
