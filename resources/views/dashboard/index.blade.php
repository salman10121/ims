@extends('layout.app')

@section('content')
    <div class="d-flex">
        <!-- Sidebar -->


        <!-- Main Content -->
        <div class="dashboard-content col-md-12 p-3">
            <div class="container">
                <h1 class="mb-4">Welcome to Inventory Management Dashboard</h1>

                <div class="row">
                    <!-- Product Statistics Card -->
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text">{{ $totalProducts }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Supplier Statistics Card -->
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Suppliers</h5>
                                <p class="card-text">{{ $totalSuppliers }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Statistics Card -->
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Customers</h5>
                                <p class="card-text">{{ $totalCustomers }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stock Statistics Card -->
                    <div class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Low Stock Items</h5>
                                <p class="card-text">{{ $lowStockItems }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Recent Activity
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>Product XYZ added to inventory.</li>
                                    <li>Supplier ABC was added.</li>
                                    <li>Customer DEF made a purchase.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- jQuery -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr JS and CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // Toastr options
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "timeOut": "3000", // 5 seconds
        "extendedTimeOut": "1000",
        "positionClass": "toast-top-right"
    };

    @if(session('success'))
        // Show toaster with custom primary color
        toastr.success("{{ session('success') }}");
        $('.toast-success').css('background-color', '#007bff'); // Bootstrap primary blue
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>


@endsection
