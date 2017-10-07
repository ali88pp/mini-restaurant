@extends('_layout.master')

@section('content')
<div class="container">
  {{ $floor->name }}
  <a href="{{ route('floor.edit', [ 'id' => $floor->id ]) }}" class="btn btn-primary">Edit</a>
  <form action="{{ route('floor.destroy', [ 'id' => $floor->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button class="btn btn-primary">Delete</button>
  </form>
</div>
@stop
