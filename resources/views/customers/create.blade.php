@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Add New Customer</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('customers.store') }}">
            @csrf

            <div class="form-group mb-2">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group mb-2">
                <label>Email:</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Address:</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
