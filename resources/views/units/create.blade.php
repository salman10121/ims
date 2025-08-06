@extends('layout.app')

@section('content')
<div class="container">
    <h2>Add New Unit</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('units.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Unit Name</label>
            <input type="text" name="name" class="form-control" placeholder="e.g., Kilogram" required>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('units.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
