@extends('layout.app')

@section('content')
<div class="container">
    <h2>Edit Role</h2>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
