@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg" style="max-width: 400px; margin: auto;">
        <div class="card-body text-center">
            <div class="avatar-lg">
                <img src="{{ $user['avatar'] }}" alt="Profile Image" class="avatar-img rounded-circle" width="100">
            </div>
            <h4 class="mt-3">{{ $user['name'] }}</h4>
            <p class="text-muted">{{ $user['email'] }}</p>
            <p class="text-muted">{{ $user['phone'] }}</p>
            <a href="{{ route('dashboard.index') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
