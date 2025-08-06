@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-4">Edit Order</h2>

                <form action="{{ route('orders.update', $order->id) }}" method="POST"  class="p-4 border rounded shadow-sm bg-light">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @if($order->user_id == $user->id) selected @endif>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="total_amount" class="form-label">Total Amount</label>
                        <input type="text" name="total_amount" id="total_amount" value="{{ $order->total_amount }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                            <option value="completed" @if($order->status == 'completed') selected @endif>Completed</option>
                            <option value="canceled" @if($order->status == 'canceled') selected @endif>Canceled</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update Order
                    </button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
