@extends('layout.app')

@section('content')
<div class="container">
    <h2>Edit Item</h2>

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
        </div>

        <div class="form-group mt-2">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $item->description }}</textarea>
        </div>

        <div class="form-group mt-2">
            <label>Price</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ $item->price }}" required>
        </div>

        <div class="form-group mt-2">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $item->quantity }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>
@endsection
