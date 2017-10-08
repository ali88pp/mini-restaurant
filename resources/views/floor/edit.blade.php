@extends('_layout.master')
@section('content')
<div class="container">
  <h2>Create Floor</h2>
  <form action="{{ route('floor.edit', [ 'id' => $floor->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="form-group">
      <label for="floor">Name:</label>
      <input type="text" class="form-control" id="floor" name="name" value="{{ $floor->name }}">
    </div>
    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Update">
    </div>
  </form>
</div>
@stop
