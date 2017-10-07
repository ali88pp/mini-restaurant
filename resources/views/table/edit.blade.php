@extends('_layout.master')

@section('content')
<div class="container">
  <h2>Edit Table</h2>
  <form action="{{ route('table.edit', [ 'id' => $table->no ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="form-group">
      <label for="table">Table No:</label>
      <input type="text" class="form-control" id="table" name="no" value="{{ $table->no }}">
    </div>

    <div class="form-group">
      <label for="table">Seat:</label>
      <input type="text" class="form-control" id="table" name="seat" value="{{ $table->seat }}">
    </div>

    <div class="form-group">
      <label for="table">Floor:</label>
      <select class="form-control" id="table" name="floor" title= "Choose Floor...">
        @foreach($floors as $floor)
          @if ($floor->id == $table->floor)
            <option selected value="{{ $floor->id }}">{{ $floor->name }}</option>
          @else
            <option value="{{ $floor->id }}">{{ $floor->name }}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="table">Block:</label>
      <input type="text" class="form-control" id="table" name="block" value="{{ $table->block }}">
    </div>

    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Update">
    </div>

  </form>
</div>
@stop
