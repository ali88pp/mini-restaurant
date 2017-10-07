@extends('_layout.master')

@section('content')
<div class="container">
  <h2>Create Floor</h2>
  <form action="{{ route('floor.create') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="floor">Name:</label>
      <input type="text" class="form-control" id="floor" name="name">
    </div>
    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Submit Button">
    </div>
  </form>
</div>
@stop
