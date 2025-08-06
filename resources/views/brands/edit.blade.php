@extends('layout.app')

@section('content')
<div class="container">
    <h2>Edit Brand</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

  <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Brand Name</label>
        <input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
    </div>

    <div class="form-group mt-3">
        <label>Brand Image</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>

    @if($brand->image)
        <div class="mt-2">
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $brand->image) }}" alt="Brand Image" style="max-width: 150px; max-height: 150px;">
        </div>
    @endif

    <br>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('brands.index') }}" class="btn btn-secondary">Back</a>
</form>

</div>
@endsection
