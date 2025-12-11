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

        /* Category Cards */
        .category-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 280px;
            height: 280px;
        }
        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(220,45,52,0.15);
            border-color: #dc2d34;
        }
        .category-card-link:hover .category-card {
            background: linear-gradient(135deg, #fff 0%, #fef2f2 100%);
        }
        .category-icon {
            transition: transform 0.3s ease;
            flex-shrink: 0;
            margin-bottom: 1rem;
        }
        .category-card:hover .category-icon {
            transform: scale(1.1);
        }
        .category-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Product Cards */
        .product-card {
            transition: all 0.3s ease;
            border: none;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 380px;
            height: 380px;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .product-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 12px 12px 0 0;
            flex-shrink: 0;
        }
        .product-image {
            transition: transform 0.3s ease;
            width: 100%;
            height: 200px;
            object-fit: contain;
            padding: 1rem;
        }
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        .product-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1rem;
        }

        /* Navbar */
        nav.navbar {
            background: linear-gradient(135deg, #ffffff 0%, #fefefe 100%);
            border-bottom: 1px solid rgba(0,0,0,0.08);
            backdrop-filter: blur(10px);
        }
        nav a.nav-link {
            color: #222 !important;
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
        }
        nav a.nav-link:hover {
            color: #dc2d34 !important;
        }
        nav a.nav-link.active {
            color: #dc2d34 !important;
            font-weight: 600;
        }
        nav a.nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 2px;
            background-color: #dc2d34;
            border-radius: 1px;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }
        .navbar-brand:hover {
            transform: scale(1.02);
        }

        /* AJAX Search Styles */
        .search-results-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            max-height: 400px;
            overflow-y: auto;
            z-index: 1050;
            display: none;
            margin-top: 2px;
        }

        .search-result-item {
            padding: 12px 15px;
            border-bottom: 1px solid #f8f9fa;
            cursor: pointer;
            transition: background-color 0.2s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
        }

        .search-result-item:hover,
        .search-result-item:focus {
            background-color: #f8f9fa;
            text-decoration: none;
            color: #333;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-image {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .search-result-content {
            flex: 1;
            min-width: 0;
        }

        .search-result-name {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .search-result-category {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 2px;
        }

        .search-result-price {
            font-size: 13px;
            font-weight: 600;
            color: #dc2d34;
        }

        .search-loading,
        .search-no-results {
            padding: 15px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }

        .search-no-results {
            border-top: 1px solid #f8f9fa;
        }

        /* Mobile navbar improvements */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(255,255,255,0.95);
                border-radius: 12px;
                margin-top: 1rem;
                padding: 1rem;
                box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            }
            .navbar-nav {
                text-align: center;
            }
            .navbar-nav .nav-item {
                margin: 0.5rem 0;
            }

            .search-results-dropdown {
                left: 1rem;
                right: 1rem;
                max-height: 300px;
            }
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
<nav class="navbar navbar-expand-lg navbar-light py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <i class="fas fa-cogs me-2" style="color: #dc2d34;"></i>
            <span style="color: #322c2c; font-weight: 700;">AutoParts Hub</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                        <i class="fas fa-box me-1"></i>Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        <i class="fas fa-envelope me-1"></i>Contact
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav">
                {{-- Cart Badge --}}
                <li class="nav-item position-relative me-3">
                    <a class="nav-link position-relative px-3" href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart me-1"></i>Cart
                        @if(isset($cartCount) && $cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                                  style="background-color: #dc2d34; font-size: 0.7rem;">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                </li>

                {{-- Search Form --}}
                <li class="nav-item position-relative">
                    <form class="d-flex align-items-center" action="{{ route('products.index') }}" method="GET">
                        <div class="input-group">
                            <input class="form-control border-end-0" type="search" name="query" id="search-input"
                                   placeholder="Search products..." aria-label="Search"
                                   value="{{ request('query') }}" style="max-width: 200px;" autocomplete="off">
                            <button class="btn btn-outline-secondary border-start-0" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    {{-- AJAX Search Results Dropdown --}}
                    <div id="search-results" class="search-results-dropdown">
                        <div id="search-loading" class="search-loading" style="display: none;">
                            <i class="fas fa-spinner fa-spin me-2"></i>Searching...
                        </div>
                        <div id="search-results-list"></div>
                        <div id="search-no-results" class="search-no-results" style="display: none;">
                            No products found
                        </div>
                    </div>
                </li>

                {{-- Admin Login --}}
                <li class="nav-item ms-3">
                    <a href="{{ route('admin.login') }}" class="btn btn-brand btn-sm">
                        <i class="fas fa-user-shield me-1"></i>Admin
                    </a>
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

{{-- AJAX Search JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    const searchResultsList = document.getElementById('search-results-list');
    const searchLoading = document.getElementById('search-loading');
    const searchNoResults = document.getElementById('search-no-results');

    let searchTimeout;

    // Hide results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Handle search input
    searchInput.addEventListener('input', function() {
        const query = this.value.trim();

        // Clear previous timeout
        clearTimeout(searchTimeout);

        // Hide results if query is too short
        if (query.length < 2) {
            searchResults.style.display = 'none';
            return;
        }

        // Show loading
        searchResults.style.display = 'block';
        searchLoading.style.display = 'block';
        searchResultsList.innerHTML = '';
        searchNoResults.style.display = 'none';

        // Debounce search requests
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });

    // Handle Enter key to submit form
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const form = this.closest('form');
            if (this.value.trim().length >= 2) {
                form.submit();
            }
        }

        // Hide results on Escape
        if (e.key === 'Escape') {
            searchResults.style.display = 'none';
        }
    });

    async function performSearch(query) {
        try {
            const response = await fetch(`/products/search-ajax?q=${encodeURIComponent(query)}`);
            const products = await response.json();

            searchLoading.style.display = 'none';

            if (products.length === 0) {
                searchNoResults.style.display = 'block';
                return;
            }

            searchNoResults.style.display = 'none';
            displayResults(products);
        } catch (error) {
            console.error('Search error:', error);
            searchLoading.style.display = 'none';
            searchNoResults.style.display = 'block';
        }
    }

    function displayResults(products) {
        searchResultsList.innerHTML = '';

        products.forEach(product => {
            const item = document.createElement('a');
            item.href = `/products/${product.slug}`;
            item.className = 'search-result-item';

            const imageUrl = product.image ? `/images/${product.image}` : '/images/placeholder.png';

            item.innerHTML = `
                <img src="${imageUrl}" alt="${product.name}" class="search-result-image" onerror="this.src='/images/placeholder.png'">
                <div class="search-result-content">
                    <div class="search-result-name">${highlightMatch(product.name, searchInput.value)}</div>
                    <div class="search-result-category">${product.category}</div>
                    <div class="search-result-price">PKR ${new Intl.NumberFormat().format(product.price)}</div>
                </div>
            `;

            searchResultsList.appendChild(item);
        });
    }

    function highlightMatch(text, query) {
        if (!query) return text;
        const regex = new RegExp(`(${query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
        return text.replace(regex, '<mark>$1</mark>');
    }

    // Close results when form is submitted
    const searchForm = searchInput.closest('form');
    searchForm.addEventListener('submit', function() {
        searchResults.style.display = 'none';
    });
});
</script>

</body>
</html>
