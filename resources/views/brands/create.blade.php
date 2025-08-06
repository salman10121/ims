@extends('layout.app')

@section('content')
<div class="container">
    <h2>Add New Brand</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('brands.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Brand Name</label>
            <input type="text" name="name" class="form-control" placeholder="e.g., Samsung" required>
        </div>
        <div class="form-group mb-3">
    <label>Brand Image</label>
    <input type="file" name="image" class="form-control" accept="image/*">
</div>

        <br>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('brands.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
