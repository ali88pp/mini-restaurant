@extends('_layout.master')
@section('content')
<div class="container">
  <h2>Table List</h2>
  <table class = "table">
    <thead>
      <tr>
        <th>Table No</th>
        <th>Seat</th>
        <th>Block</th>
        <th>Floor</th>
    </thead>
    <tbody>
      @foreach($tables as $table)
      <tr>
        <td>{{ $table->no }}</td>
        <td>{{ $table->seat }}</td>
        <td>{{ $table->block }}</td>
        <td>{{ $table->floor }}</td>
        <td>
            <a href="{{ route('table.edit', [ 'id' => $table->no ]) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('table.destroy', [ 'id' => $table->no ]) }}" method="post">
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
