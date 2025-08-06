{{-- resources/views/categories/edit.blade.php --}}
@extends('layout.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <h2>Edit Category</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
    </form>
        </div>
    </div>
</div>
@endsection
