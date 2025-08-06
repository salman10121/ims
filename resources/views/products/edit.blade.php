{{-- resources/views/products/edit.blade.php --}}
@extends('layout.app')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <h2>Edit Product</h2>

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
 <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control" required>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

{{-- Brand --}}
<div class="form-group mb-3">
    <label>Brand</label>
    <select name="brand_id" class="form-control" required>
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}"
                {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
</div>

{{-- Unit --}}
<div class="form-group mb-3">
    <label>Unit</label>
    <select name="unit_id" class="form-control" required>
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}"
                {{ $product->unit_id == $unit->id ? 'selected' : '' }}>
                {{ $unit->name }}
            </option>
        @endforeach
    </select>
</div>


                    <div class="form-group mb-3">
                        <label>Price</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control"
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Image</label><br>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="100"><br>
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                    </div>
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>

    </div>
@endsection
