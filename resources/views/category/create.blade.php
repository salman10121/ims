{{-- resources/views/categories/create.blade.php --}}
@extends('layout.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
 <h2>Add New Category</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
    </form>
        </div>
    </div>

</div>
@endsection
