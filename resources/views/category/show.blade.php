@extends('_layout.master')

@section('content')
<div class="container">
  {{ $floor->name }}
  <a href="{{ route('category.edit', [ 'id' => $category->id ]) }}" class="btn btn-primary">Edit</a>
  <form action="{{ route('category.destroy', [ 'id' => $category->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button class="btn btn-primary">Delete</button>
  </form>
</div>
@stop
