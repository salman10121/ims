@extends('layout.app')

@section('content')
<div class="container">
    <h2>Add New Item</h2>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group mt-2">
            <label>Price</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>
@endsection
