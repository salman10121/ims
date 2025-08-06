@extends('layout.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
 <h1>Create Order</h1>
   <form action="{{ route('orders.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
    @csrf

    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" id="user_id" class="form-select" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="total_amount" class="form-label">Total Amount</label>
        <input type="text" name="total_amount" id="total_amount" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select" required>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="canceled">Canceled</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Order</button>
</form>


        </div>
    </div>
</div>
   @endsection
