<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f1f1f1;
            background-image: url('{{ asset('assets/img/inventory-bg.png') }}'); /* Replace with your own IMS-related image */
            background-size: cover;
            background-repeat: repeat;
        }

        .navbar {
            background-color: #c9ac5c;
        }

        .center-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 15px;
            position: relative;
        }

        .card {
            background-image: url('{{ asset('assets/img/stock.png') }}');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.55); /* Dark overlay */
            z-index: 0;
            border-radius: 20px;
        }

        .card-body {
            position: relative;
            z-index: 1;
            padding: 30px;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.85);
            color: #000;
        }

        .form-control::placeholder {
            color: #333;
        }

        footer {
            background-color: #000;
        }

        .side-icons {
            position: absolute;
            font-size: 80px;
            opacity: 0.08;
        }

        .side-icons.left {
            top: 20%;
            left: 5%;
        }

        .side-icons.right {
            bottom: 20%;
            right: 5%;
        }

        .ims-header {
            font-weight: bold;
            font-size: 1.8rem;
            margin-bottom: 25px;
            color: #333;
            text-shadow: 1px 1px 0 #fff;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="side-icons left">📦 📁</div>
<div class="side-icons right">📊 🔧</div>

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
    <div>
        <div class="ims-header">🔐 Welcome to IMS Login</div>

        <div class="card">
            <div class="card-body">
                <h4 class="text-center mb-4">Login to Your Account</h4>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('users.login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="login_email">Email Address</label>
                        <input type="email" class="form-control" id="login_email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="login_password">Password</label>
                        <input type="password" class="form-control" id="login_password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-3 text-white">
    &copy; {{ date('Y') }} Inventory Management System. All rights reserved.
</footer>

</body>
</html>
