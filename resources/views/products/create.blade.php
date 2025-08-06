{{-- resources/views/products/create.blade.php --}}
@extends('layout.app')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <h2>Add Product</h2>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
{{-- Name --}}
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    {{-- Category --}}
                    <div class="form-group mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Brand --}}
                    <div class="form-group mb-3">
                        <label>Brand</label>
                        <select name="brand_id" class="form-control" required>
                            <option value="">-- Select Brand --</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Unit --}}
                    <div class="form-group mb-3">
                        <label>Unit</label>
                        <select name="unit_id" class="form-control" required>
                            <option value="">-- Select Unit --</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    {{-- Price --}}
                    <div class="form-group mb-3">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>

                    {{-- Quantity --}}
                    <div class="form-group mb-3">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>

                    {{-- Image --}}
                    <div class="form-group mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    {{-- Description --}}
                    <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-success">Save</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </form>

            </div>
        </div>

    </div>
@endsection
