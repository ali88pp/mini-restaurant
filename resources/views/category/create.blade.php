@extends('_layout.master')

@section('content')
<div class="container">
  <h2>Create Category</h2>
  <form action="{{ route('category.create') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="category">Category Name:</label>
      <input type="text" class="form-control" id="category" name="name">
    </div>
    <div class="form-group">
      <label for="category">Sort:</label>
      <input type="text" class="form-control" id="category" name="sort">
    </div>
    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Submit Button">
    </div>
  </form>
</div>
@stop
