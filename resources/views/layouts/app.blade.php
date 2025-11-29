<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auto Parts Hub')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* Bubbly, soft UI */
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

        /* Cards */
        .soft-card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: var(--soft-shadow);
            padding: 1.25rem;
        }

        .soft-card-sm {
            background: var(--card-bg);
            border-radius: var(--radius-md);
            box-shadow: var(--soft-shadow-2);
            padding: 1rem;
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

        /* Form controls */
        .form-control, .form-select, textarea.form-control {
            border-radius: 10px;
            box-shadow: inset 0 1px 0 rgba(0,0,0,0.02);
            border: 1px solid rgba(0,0,0,0.08);
        }

        .rounded-image {
            border-radius: 12px;
            object-fit: cover;
        }

        .icon-circle {
            width: 48px;
            height: 48px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: linear-gradient(180deg,#fff,#f8f8f8);
            box-shadow: var(--soft-shadow-2);
        }

        h2.hb, h3.hb { color: var(--brand); font-weight: 700; }

        /* Table */
        .table thead th { border-bottom: none; background: transparent; }
        .table tbody tr td { vertical-align: middle; }

        .badge {
            font-size: 0.7rem;
            padding: 3px 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        /* Navbar */
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

        /* Footer */
        footer {
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
            border-top: 1px solid #eee;
            color: #777;
        }

        @media (max-width: 576px){
            .soft-card { padding: .9rem; border-radius: 14px; }
            .btn-brand { padding: .45rem .8rem; }
        }
    </style>
</head>
<body>
{{-- Navbar --}}
<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
        <a class="navbar-brand" style="color: #322c2c" href="{{ route('home') }}">AutoParts Hub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                {{--                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>

                {{-- Cart Badge --}}
                <li class="nav-item position-relative">
                    <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                        View Cart 🛒
                        @if(isset($cartCount) && $cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                </li>
            </ul>

            {{-- Search Form --}}
            <form class="d-flex ms-3" action="{{ route('products.index') }}" method="GET">
                <input class="form-control" type="search" name="query" placeholder="Search Products" aria-label="Search" value="{{ request('query') }}">
                <button class="btn btn-outline-dark ms-2" type="submit">Search</button>
            </form>
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
