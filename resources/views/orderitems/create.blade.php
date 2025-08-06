@extends('layout.app')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('order-items.store') }}" method="POST">
                    @csrf
                    <label>Order</label>
                    <select name="order_id">
                        @foreach ($orders as $order)
                            <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                        @endforeach
                    </select>

                    <label>Product</label>
                    <select name="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                        @endforeach
                    </select>

                    <label>Quantity</label>
                    <input type="number" name="quantity" min="1">

                    <button type="submit">Add to Order</button>
                </form>



            </div>
        </div>
    </div>
@endsection
