@extends('layouts.app')

@section('title', 'About Us - Auto Parts Hub')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <h1 class="display-4 fw-bold text-primary mb-4">About Auto Parts Hub</h1>
            <p class="lead mb-4">
                Your trusted partner for premium automotive parts and accessories. We provide quality auto parts with exceptional service to keep your vehicle running smoothly.
            </p>
            <div class="d-flex gap-3">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fas fa-home me-2"></i>Back to Home
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-shopping-bag me-2"></i>Shop Parts
                </a>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <img src="{{ asset('images/engine.png') }}" alt="Auto Parts Hub" class="img-fluid rounded shadow" style="max-height: 400px;">
        </div>
    </div>

    <!-- Our Story Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <h2 class="h1 text-center mb-4">Our Story</h2>
                    <p class="lead text-center mb-4">
                        Founded with a passion for automotive excellence, Auto Parts Hub has been serving the automotive community for years.
                        We understand that every vehicle owner deserves access to high-quality parts that ensure safety, reliability, and performance.
                    </p>
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <div class="h1 text-primary mb-2"><i class="fas fa-award"></i></div>
                            <h5>Quality Assured</h5>
                            <p>We source only the finest automotive parts from trusted manufacturers worldwide.</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="h1 text-primary mb-2"><i class="fas fa-shipping-fast"></i></div>
                            <h5>Fast Delivery</h5>
                            <p>Quick and reliable shipping to get your vehicle back on the road faster.</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="h1 text-primary mb-2"><i class="fas fa-headset"></i></div>
                            <h5>Expert Support</h5>
                            <p>Our knowledgeable team is here to help you find the perfect parts for your needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="row mb-5">
        <div class="col-lg-6">
            <h2 class="h1 mb-4">Why Choose Auto Parts Hub?</h2>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                        <div>
                            <h5>Genuine Parts</h5>
                            <p>We offer authentic OEM and high-quality aftermarket parts.</p>
                        </div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                        <div>
                            <h5>Competitive Pricing</h5>
                            <p>Best prices guaranteed with regular discounts and promotions.</p>
                        </div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                        <div>
                            <h5>Expert Guidance</h5>
                            <p>Get expert advice from our certified automotive specialists.</p>
                        </div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                        <div>
                            <h5>Secure Shopping</h5>
                            <p>Safe and secure online shopping with multiple payment options.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                    <i class="fas fa-tools fa-4x text-primary mb-4"></i>
                    <h3>Premium Automotive Solutions</h3>
                    <p class="mb-4">
                        From engine components to exterior accessories, we have everything you need to maintain and enhance your vehicle.
                    </p>
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="h2 text-primary mb-2">1000+</div>
                            <small class="text-muted">Parts Available</small>
                        </div>
                        <div class="col-6">
                            <div class="h2 text-primary mb-2">500+</div>
                            <small class="text-muted">Happy Customers</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-primary">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-bullseye me-2"></i>Our Mission</h4>
                </div>
                <div class="card-body">
                    <p>
                        To provide automotive enthusiasts and everyday drivers with access to high-quality,
                        affordable auto parts while delivering exceptional customer service and expert guidance
                        for all their automotive needs.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-success">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="fas fa-eye me-2"></i>Our Vision</h4>
                </div>
                <div class="card-body">
                    <p>
                        To become the leading online destination for automotive parts, recognized for our
                        commitment to quality, innovation, and customer satisfaction in the automotive industry.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions CTA -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-light border-0">
                <div class="card-body text-center py-5">
                    <h3 class="mb-3">Learn More About Our Policies</h3>
                    <p class="mb-4">Read our terms and conditions to understand our commitment to your satisfaction.</p>
                    <a href="{{ route('terms') }}" class="btn btn-lg btn-primary">
                        <i class="fas fa-file-contract me-2"></i>View Terms & Conditions
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Footer -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <div class="btn-group" role="group">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">
                    <i class="fas fa-home me-1"></i>Home
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-shopping-bag me-1"></i>Products
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                    <i class="fas fa-envelope me-1"></i>Contact
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
