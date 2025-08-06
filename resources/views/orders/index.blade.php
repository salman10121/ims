@extends('layout.app')

@section('content')
    <h1>Orders</h1>
    <div class="d-flex justify-content-end">
        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create Order</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="order-table">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>User</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->user?->name }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>{{ ucfirst($order->status) }}</td>

                                <td>
                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
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
        $('#order-table').DataTable({
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
