@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Edit Supplier</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('suppliers.update', $supplier->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-2">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $supplier->name) }}" required>
            </div>

            <div class="form-group mb-2">
                <label>Company:</label>
                <input type="text" name="company" class="form-control" value="{{ old('company', $supplier->company) }}">
            </div>

            <div class="form-group mb-2">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $supplier->email) }}">
            </div>

            <div class="form-group mb-2">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $supplier->phone) }}">
            </div>

            <div class="form-group mb-3">
                <label>Address:</label>
                <textarea name="address" class="form-control">{{ old('address', $supplier->address) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
