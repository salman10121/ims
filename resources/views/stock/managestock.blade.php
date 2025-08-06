<form action="{{ route('stocks.add') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Product</label>
        <select name="product_id" class="form-control" required>
            <option value="">-- Select Product --</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <button class="btn btn-success">Add Stock</button>
</form>

<form action="{{ route('stocks.reduce') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Product</label>
        <select name="product_id" class="form-control" required>
            <option value="">-- Select Product --</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <button class="btn btn-danger">Reduce Stock</button>
</form>
