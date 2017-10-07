@extends('_layout.master')

@section('content')
  @foreach($floors as $floor)
    <div>{{ $floor->name }}</div>
  @endforeach
@stop
