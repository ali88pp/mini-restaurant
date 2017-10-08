@extends('_layout.master')

@section('content')
<div class="container">
  <h2>Create Customer</h2>
  <form action="{{ route('customer.create') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="customer">Customer Name:</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
      <label for="customer">Code:</label>
      <input type="text" class="form-control" id="code" name="code">
    </div>
    <div class="form-group">
      <label for="customer">Contact:</label>
      <input type="text" class="form-control" id="contact" name="contact">
    </div>
    <div class="form-group">
      <label for="customer">Address:</label>
      <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="form-group">
      <label for="customer">Point:</label>
      <input type="text" class="form-control" id="point" name="point">
    </div>
    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Submit Button">
    </div>
  </form>
</div>
@stop
