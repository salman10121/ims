<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Inventory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background: linear-gradient(135deg, #e6e6e6, #cac3c3);
            position: relative;
        }

        .navbar {
            background-color: #c9ac5c;
        }

        .center-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px 15px;
            position: relative;
            z-index: 1;
        }

        .ims-header {
            font-weight: bold;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #3a3a3a;
            text-shadow: 1px 1px 0 #fff;
        }

        .card {
            background-image: url('{{ asset('assets/img/stock.png') }}');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
            border-radius: 15px;
        }

        .card-body {
            position: relative;
            z-index: 1;
            padding: 30px;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.978);
            color: #000;
        }

        .form-control::placeholder {
            color: #333;
        }

        footer {
            background-color: #000;
        }

        /* Decorative background icons */
        .bg-icons {
            position: absolute;
            top: 20%;
            left: 5%;
            font-size: 80px;
            color: rgba(0, 0, 0, 0.05);
            z-index: 0;
        }

        .bg-icons-right {
            position: absolute;
            bottom: 10%;
            right: 5%;
            font-size: 80px;
            color: rgba(0, 0, 0, 0.05);
            z-index: 0;
        }
    </style>
</head>
<body>

<div class="bg-icons">📦 📊 📁</div>
<div class="bg-icons-right">🔧 🏷️ 🗂️</div>

<nav class="navbar navbar-expand-lg navbar-dark shadow">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="{{ url('/') }}">IMS</a>
        <div class="ms-auto">
            <a href="{{ route('users.loginpage') }}" class="btn btn-outline-dark me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
        </div>
    </div>
</nav>

<div class="center-container">
    <div class="ims-header text-center">📦 Start Managing Inventory Today!</div>

    <div class="card">
        <div class="card-body">
            <h4 class="text-center mb-4"> Register Now </h4>

            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                    <small class="form-text text-light">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group mb-4">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>

<footer class="text-center py-3 text-white">
    &copy; {{ date('Y') }} Inventory Management System. All rights reserved.
</footer>

</body>
</html>
