<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #cac3c3;
        }
        .navbar {
            background-color: #c9ac5c;
        }
       .hero {
        background: url('{{ asset('assets/img/stock.png') }}') no-repeat center center / cover;
        color: white;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }
        .ims-images img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="#">IMS</a>
            <div class="ms-auto">
                <a href="{{ route('users.loginpage') }}" class="btn btn-outline-dark me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
            </div>
        </div>
    </nav>

    <section class="hero text-center">
        <div>
            <h1 class="display-4">Inventory Management System</h1>
            <p class="lead">Track, manage, and optimize your inventory with ease.</p>
        </div>
    </section>

   <section class="container py-5">
    <h2 class="text-center mb-4">Why Use IMS?</h2>
    <div class="row text-center mb-5">
        <div class="col-md-4 ims-images">
            <img src="{{ asset('assets/img/download .jpeg') }}" alt="Warehouse" class="img-fluid rounded">
            <h5 class="mt-3">Real-Time Stock Tracking</h5>
        </div>
        <div class="col-md-4 ims-images">
            <img src="{{ asset('assets/img/report.jpeg') }}" alt="Inventory Reports" class="img-fluid rounded">
            <h5 class="mt-3">Detailed Reports</h5>
        </div>
        <div class="col-md-4 ims-images">
            <img src="{{ asset('assets/img/dashboard.png') }}" alt="Dashboard" class="img-fluid rounded">
            <h5 class="mt-3">User-Friendly Dashboard</h5>
        </div>
    </div>
</section>


    <footer class="text-center py-3 bg-dark text-white">
        &copy; {{ date('Y') }} Inventory Management System. All rights reserved.
    </footer>

</body>
</html>
