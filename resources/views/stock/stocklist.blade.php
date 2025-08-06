{{-- resources/views/products/index.blade.php --}}
@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Products</h2>
        <div class="d-flex justify-content-end">
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
               <table class="table" id="product-table">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stockLogs as $log)
            <tr>
                <td>{{ $log->product->name }}</td>
                <td>{{ $log->type == 'in' ? 'Added' : 'Reduced' }}</td>
                <td>{{ $log->quantity }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <script>
        $('#product-table').DataTable({
            "lengthChange": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "pageLength": 10,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            "order": [
                [0, "desc"]
            ],
            "language": {
                "paginate": {
                    "next": "Next",
                    "previous": "Previous"
                },
                "info": "Showing _START_ to _END_ of _TOTAL_ Entries",
                "lengthMenu": "Show _MENU_ Entries"
            }
        });
    </script>
@endsection
