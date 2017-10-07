@extends('_layout.master')

@section('content')
<div class="container">
  <h2>Edit {{ $customer->name }}</h2>
  <form action="{{ route('customer.edit', [ 'id' => $customer->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="form-group">
      <label for="customer">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}">
    </div>

    <div class="form-group">
      <label for="customer">Contact:</label>
      <input type="text" class="form-control" id="contact" name="code" value="{{ $customer->code }}">
    </div>

    <div class="form-group">
      <label for="customer">Contact:</label>
      <input type="text" class="form-control" id="contact" name="contact" value="{{ $customer->contact }}">
    </div>

    <div class="form-group">
      <label for="customer">Address:</label>
      <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}">
    </div>

    <div class="form-group">
      <label for="customer">Point:</label>
      <input type="text" class="form-control" id="point" name="point" value="{{ $customer->point }}">
    </div>

    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Update">
    </div>

  </form>
</div>
@stop
