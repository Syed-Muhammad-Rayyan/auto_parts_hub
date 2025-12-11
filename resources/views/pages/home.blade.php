@extends('layouts.app')

@section('title', 'Home - Auto Parts Hub')

@section('content')
    <div class="test">
        {{-- HERO SECTION --}}
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6" id="left_part">
                    <h1 class="display-3 fw-bold text-pretty"> <span style="color: #dc2d34">Auto</span> Parts Hub</h1>
                    <p class="lead fw-semibold">Your one-stop shop for quality car parts and accessories</p>
                    <a href="{{ route('products.index') }}" class="btn btn-danger">Shop Now</a>
                </div>

                <div class="col-md-6 text-center" id="right_part">
                    <img src="{{ asset('images/brake2.png') }}" alt="Car" class="img-fluid mt-5" height="900">
                </div>
            </div>
            <hr style="border: none; height: 4px; background-color: #dc2d34; opacity: 1; width: 100%; margin: 0 auto; border-radius: 2px;">
        </div>

        <!-- CATEGORIES SECTION -->
        <div class="container-fluid py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
            <div class="container">
                <h2 class="text-center fw-bold mb-5" style="color: #dc2d34;">Our Categories</h2>

                <div class="row g-4 justify-content-center">
                    <!-- Engine Parts -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('products.index', ['category' => 'Engine Parts']) }}" class="text-decoration-none category-card-link">
                            <div class="category-card soft-card text-center p-4">
                                <div class="category-icon">
                                    <img src="{{ asset('images/engine.png') }}" alt="Engine Parts" class="img-fluid rounded-image" style="width: 120px; height: 120px; object-fit: contain;">
                                </div>
                                <div class="category-content">
                                    <h5 class="fw-bold mb-3" style="color: #dc2d34;">Engine Parts</h5>
                                    <p class="text-muted small mb-0">Pistons, valves, timing belts & more</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Brake System -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('products.index', ['category' => 'Brake System']) }}" class="text-decoration-none category-card-link">
                            <div class="category-card soft-card text-center p-4">
                                <div class="category-icon">
                                    <img src="{{ asset('images/brake1.png') }}" alt="Brake System" class="img-fluid rounded-image" style="width: 120px; height: 120px; object-fit: contain;">
                                </div>
                                <div class="category-content">
                                    <h5 class="fw-bold mb-3" style="color: #dc2d34;">Brake System</h5>
                                    <p class="text-muted small mb-0">Pads, rotors, calipers & fluids</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Transmission -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('products.index', ['category' => 'Transmission']) }}" class="text-decoration-none category-card-link">
                            <div class="category-card soft-card text-center p-4">
                                <div class="category-icon">
                                    <img src="{{ asset('images/transmission.png') }}" alt="Transmission" class="img-fluid rounded-image" style="width: 120px; height: 120px; object-fit: contain;">
                                </div>
                                <div class="category-content">
                                    <h5 class="fw-bold mb-3" style="color: #dc2d34;">Transmission</h5>
                                    <p class="text-muted small mb-0">Gears, clutches & drivetrain parts</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Tires & Wheels -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('products.index', ['category' => 'Tires & Wheels']) }}" class="text-decoration-none category-card-link">
                            <div class="category-card soft-card text-center p-4">
                                <div class="category-icon">
                                    <img src="{{ asset('images/wheel.png') }}" alt="Tires & Wheels" class="img-fluid rounded-image" style="width: 120px; height: 120px; object-fit: contain;">
                                </div>
                                <div class="category-content">
                                    <h5 class="fw-bold mb-3" style="color: #dc2d34;">Tires & Wheels</h5>
                                    <p class="text-muted small mb-0">Premium tires & alloy wheels</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Suspension Parts -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('products.index', ['category' => 'Suspension Parts']) }}" class="text-decoration-none category-card-link">
                            <div class="category-card soft-card text-center p-4">
                                <div class="category-icon">
                                    <img src="{{ asset('images/suspension.png') }}" alt="Suspension Parts" class="img-fluid rounded-image" style="width: 120px; height: 120px; object-fit: contain;">
                                </div>
                                <div class="category-content">
                                    <h5 class="fw-bold mb-3" style="color: #dc2d34;">Suspension Parts</h5>
                                    <p class="text-muted small mb-0">Shocks, struts & control arms</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Lights -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('products.index', ['category' => 'Lights']) }}" class="text-decoration-none category-card-link">
                            <div class="category-card soft-card text-center p-4">
                                <div class="category-icon">
                                    <img src="{{ asset('images/headlights.png') }}" alt="Lights" class="img-fluid rounded-image" style="width: 120px; height: 120px; object-fit: contain;">
                                </div>
                                <div class="category-content">
                                    <h5 class="fw-bold mb-3" style="color: #dc2d34;">Lights</h5>
                                    <p class="text-muted small mb-0">Headlights, taillights & bulbs</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Body Components -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('products.index', ['category' => 'Body Components']) }}" class="text-decoration-none category-card-link">
                            <div class="category-card soft-card text-center p-4">
                                <div class="category-icon">
                                    <img src="{{ asset('images/seats.png') }}" alt="Body Components" class="img-fluid rounded-image" style="width: 120px; height: 120px; object-fit: contain;">
                                </div>
                                <div class="category-content">
                                    <h5 class="fw-bold mb-3" style="color: #dc2d34;">Body Components</h5>
                                    <p class="text-muted small mb-0">Seats, mirrors & exterior parts</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Electrical Components -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('products.index', ['category' => 'Electrical Components']) }}" class="text-decoration-none category-card-link">
                            <div class="category-card soft-card text-center p-4">
                                <div class="category-icon">
                                    <img src="{{ asset('images/battery.png') }}" alt="Electrical Components" class="img-fluid rounded-image" style="width: 120px; height: 120px; object-fit: contain;">
                                </div>
                                <div class="category-content">
                                    <h5 class="fw-bold mb-3" style="color: #dc2d34;">Electrical Components</h5>
                                    <p class="text-muted small mb-0">Batteries, alternators & wiring</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- FEATURED PRODUCTS SECTION -->
    <div class="container-fluid py-5" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
        <div class="container">
            <h2 class="text-center fw-bold mb-5" style="color: #dc2d34;">Featured Products</h2>

            <div class="row justify-content-center g-4">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card soft-card">
                        <div class="product-image-container">
                            <img src="{{ asset('images/bosch oil filter.png') }}" alt="Oil Filter" class="product-image">
                        </div>
                        <div class="product-content">
                            <div>
                                <h6 class="fw-bold mb-2">Premium Bosch Oil Filter</h6>
                                <p class="text-muted small mb-3">High-quality oil filtration for optimal engine performance</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-6">PKR 1,200</span>
                                <a href="{{ route('products.show', ['slug' => 'oil-filter']) }}" class="btn btn-brand btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card soft-card">
                        <div class="product-image-container">
                            <img src="{{ asset('images/wagner brake pads.png') }}" alt="Brake Pads" class="product-image">
                        </div>
                        <div class="product-content">
                            <div>
                                <h6 class="fw-bold mb-2">Wagner Brake Pads</h6>
                                <p class="text-muted small mb-3">Premium brake pads for superior stopping power</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-6">PKR 3,500</span>
                                <a href="{{ route('products.show', ['slug' => 'brake-pads']) }}" class="btn btn-brand btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card soft-card">
                        <div class="product-image-container">
                            <img src="{{ asset('images/sparkplug.png') }}" alt="Spark Plug" class="product-image">
                        </div>
                        <div class="product-content">
                            <div>
                                <h6 class="fw-bold mb-2">Spark Plug</h6>
                                <p class="text-muted small mb-3">High-performance spark plugs for better ignition</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-6">PKR 850</span>
                                <a href="{{ route('products.show', ['slug' => 'spark-plug']) }}" class="btn btn-brand btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card soft-card">
                        <div class="product-image-container">
                            <img src="{{ asset('images/platinum battery.png') }}" alt="Car Battery" class="product-image">
                        </div>
                        <div class="product-content">
                            <div>
                                <h6 class="fw-bold mb-2">Platinum Car Battery 12V</h6>
                                <p class="text-muted small mb-3">Long-lasting battery with superior performance</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-6">PKR 9,800</span>
                                <a href="{{ route('products.show', ['slug' => 'car-battery']) }}" class="btn btn-brand btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>

@endsection
