@extends('_layout.master')

@section('content')
<div class="container">
  <h2>Edit Item : $item->name }}</h2>
  <form action="{{ route('item.edit', [ 'id' => $item->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="form-group">
      <label for="item">Item Name:</label>
      <input type="text" class="form-control" id="item" name="name" value="{{ $item->name }}">
    </div>

    <div class="form-group">
      <label for="item">Code:</label>
      <input type="text" class="form-control" id="item" name="code" value="{{ $item->code }}">
    </div>

    <div class="form-group">
      <label for="item">Price S:</label>
      <input type="text" class="form-control" id="item" name="s_usd" value="{{ $item->price['S']['USD']  }}">
      <input type="text" class="form-control" id="item" name="s_riel" value="{{ $item->price['S']['RIEL']  }}">
    </div>
    <div class="form-group">
      <label for="item">Price M:</label>
      <input type="text" class="form-control" id="item" name="m_usd" value="{{ $item->price['M']['USD']  }}">
      <input type="text" class="form-control" id="item" name="m_riel" value="{{ $item->price['M']['RIEL']  }}">
    </div>
    <div class="form-group">
      <label for="item">Price L:</label>
      <input type="text" class="form-control" id="item" name="l_usd" value="{{ $item->price['L']['USD']  }}">
      <input type="text" class="form-control" id="item" name="l_riel" value="{{ $item->price['L']['RIEL']  }}">
    </div>

    <div class="form-group">
      <label for="item">Remark:</label>
      <input type="text" class="form-control" id="item" name="remark" value="{{ $item->remake }}">
    </div>

    <div class="form-group">
      <label for="item">Category:</label>
      <select class="form-control" id="item" name="category_id" title= "Choose Category...">
        @foreach($categories as $category)
          @if ($category->id == $item->category_id)
            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-info" value="Update">
    </div>

  </form>
</div>
@stop
