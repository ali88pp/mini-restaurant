@extends('_layout.master')

@section('content')
<div class="container">
  <h2>Create Table</h2>
  <form action="{{ route('table.create') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="table">No:</label>
      <input type="text" class="form-control" id="table" name="no">
    </div>
    <div class="form-group">
      <label for="table">Seat:</label>
      <input type="text" class="form-control" id="table" name="seat">
    </div>
    <div class="form-group">
      <label for="table">Floor:</label>
      <select class="form-control" id="table" name="floor">
        <option selected>Choose Floor...</option>
        @foreach($floors as $floor)
        <option value="{{ $floor->id }}">{{ $floor->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="table">Block:</label>
      <input type="text" class="form-control" id="table" name="block">
    </div>
    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Submit Button">
    </div>
  </form>
</div>
@stop
