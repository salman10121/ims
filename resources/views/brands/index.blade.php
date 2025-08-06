@extends('layout.app')

@section('content')
    <div class="container">
        <h2>All Brands</h2>
        <div class="d-flex justify-content-end">
            <a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Add New Brand</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="brand-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand Name</th>
                            <th>image</th>
                            <th style="width:150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $key => $brand)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    @if ($brand->image)
                                        <img src="{{ asset('storage/' . $brand->image) }}" width="50">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-warning"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"
                                            title="Delete">
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
        $('#brand-table').DataTable({
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
