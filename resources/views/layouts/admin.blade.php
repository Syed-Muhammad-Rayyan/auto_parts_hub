<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Auto Parts Hub')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --brand: #dc2d34;
            --card-bg: #ffffff;
            --soft-shadow: 0 8px 20px rgba(50,40,40,0.08);
            --soft-shadow-2: 0 4px 12px rgba(50,40,40,0.06);
            --radius-lg: 18px;
            --radius-md: 12px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #fbfbfc 0%, #f6f7f9 100%);
            -webkit-font-smoothing: antialiased;
            color: #222;
        }

        .soft-card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: var(--soft-shadow);
            padding: 1.25rem;
        }

        .btn-brand {
            background-color: var(--brand);
            color: #fff;
            border-radius: 12px;
            padding: 0.55rem 1rem;
            border: none;
            box-shadow: 0 6px 14px rgba(220,45,52,0.18);
            transition: transform .12s ease, box-shadow .12s ease;
        }
        .btn-brand:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(220,45,52,0.20);
        }

        /* Breadcrumbs */
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }
        .breadcrumb-item a {
            color: #6c757d;
            text-decoration: none;
        }
        .breadcrumb-item a:hover {
            color: #dc2d34;
            text-decoration: underline;
        }
        .breadcrumb-item.active {
            color: #dc2d34;
            font-weight: 500;
        }

        /* Admin Cards */
        .admin-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        .admin-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(220,45,52,0.15);
            border-color: #dc2d34;
        }
        .admin-card:hover .admin-icon {
            transform: scale(1.1);
        }
        .admin-icon {
            transition: transform 0.3s ease;
        }

        /* Stats Cards */
        .stats-card {
            background: linear-gradient(135deg, #fff 0%, #fefefe 100%);
            transition: all 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .stats-number {
            transition: color 0.3s ease;
        }
        .stats-card:hover .stats-number {
            color: #dc2d34 !important;
        }

        nav.navbar {
            background-color: rgba(220, 45, 52, 0.73);
            border-bottom: 1px solid #eee;
        }
        nav a.nav-link {
            color: #222 !important;
            font-weight: 500;
        }
        nav a.nav-link:hover {
            color: #dc3545 !important;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
{{-- Admin Navbar --}}
<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
        <a class="navbar-brand" style="color: #322c2c" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.orders.index', ['status' => 'pending']) }}">Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.contacts.index', ['status' => 'pending']) }}">Contacts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}" target="_blank">View Site</a></li>
                <li class="nav-item ms-3">
                    <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Page Content --}}
<main class="py-5">
    @yield('content')
</main>

{{-- Footer --}}
<footer style="background-color: rgba(220, 45, 52, 0.73);">
    <h6 class="fw-bold text-pretty" style="color: black">© 2025 AutoParts Hub. All rights reserved.</h6>
</footer>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



