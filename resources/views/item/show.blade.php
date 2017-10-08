@extends('_layout.master')

@section('content')
<div class="container">
  <form action="{{ route('table.destroy', [ 'id' => $table->no ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <div class="form-group">
      <label for="table">Table No:</label>
      <input type="text" class="form-control" id="table" name="no" value="{{ $table->no }}">
    </div>

    <div class="form-group">
      <label for="table">Seat:</label>
      <input type="text" class="form-control" id="table" name="seat" value="{{ $table->seat }}">
    </div>

    <div class="form-group">
      <label for="table">Seat:</label>
      <input type="text" class="form-control" id="table" name="floor" value="{{ $table->floor }}">
    </div>

    <div class="form-group">
      <label for="table">Block:</label>
      <input type="text" class="form-control" id="table" name="block" value="{{ $table->block }}">
    </div>

    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Delete">
    </div>

  </form>
</div>
@stop
