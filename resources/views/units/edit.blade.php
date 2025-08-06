@extends('layout.app')

@section('content')
<div class="container">
    <h2>Edit Unit</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('units.update', $unit->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Unit Name</label>
            <input type="text" name="name" class="form-control" value="{{ $unit->name }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('units.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
