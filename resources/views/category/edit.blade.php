@extends('_layout.master')

@section('content')
<div class="container">
  <h2>Edit {{ $category->name }}</h2>
  <form action="{{ route('category.edit', [ 'id' => $category->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="form-group">
      <label for="category">Table No:</label>
      <input type="text" class="form-control" id="category" name="name" value="{{ $category->name }}">
    </div>

    <div class="form-group">
      <label for="category">Seat:</label>
      <input type="text" class="form-control" id="category" name="sort" value="{{ $category->sort }}">
    </div>

    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Update">
    </div>

  </form>
</div>
@stop
