@extends('_layout.master')

@section('content')
<div class="container">
  <h2>Create Item</h2>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="{{ route('item.create') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="item">Item Name:</label>
      <input type="text" class="form-control" id="item" name="name">
    </div>

    <div class="form-group">
      <label for="item">Code:</label>
      <input type="text" class="form-control" id="item" name="code" >
    </div>

    <div class="form-group">
      <label for="item">Price S:</label>
      <input type="text" class="form-control" id="item" name="price[s][usd]" >
      <input type="text" class="form-control" id="item" name="price[s][riel]" >
    </div>
    <div class="form-group">
      <label for="item">Price M:</label>
      <input type="text" class="form-control" id="item" name="price[m][usd]" >
      <input type="text" class="form-control" id="item" name="price[m][riel]" >
    </div>
    <div class="form-group">
      <label for="item">Price L:</label>
      <input type="text" class="form-control" id="item" name="price[l][usd]" >
      <input type="text" class="form-control" id="item" name="price[l][riel]" >
    </div>

    <div class="form-group">
      <label for="item">Remake:</label>
      <input type="text" class="form-control" id="item" name="remark" >
    </div>

    <div class="form-group">
      <label for="item">Category:</label>
      <select class="form-control" id="item" name="category_id">
        <option selected>Choose Category...</option>

        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach

      </select>
    </div>

    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Submit Button">
    </div>
  </form>
</div>
@stop
