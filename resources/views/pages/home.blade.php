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

        <br>
        <h2 class="text-center fw-bold mb-4" style="color: #dc2d34;">Our Categories</h2>

        {{-- CATEGORIES ROW 1 --}}
        <div class="container-fluid py-5 bg-white">
            <div class="d-flex justify-content-center flex-wrap gap-4 px-5 container-fluid">

                <a href="{{ route('products.index', ['category' => 'Engine Parts']) }}" class="text-decoration-none d-flex">
                    <div class="fw-bold text-pretty text-center py-3 flex-fill"
                         style="color: #dc2d34; border: 3px solid #dc2d34; border-radius: 15px; max-width: 250px;">
                        <img src="{{ asset('images/engine.png') }}" alt="Engine Parts" class="img-fluid mb-2" style="max-height: 150px; object-fit: contain;">
                        <h5 class="fw-semibold">Engine Parts</h5>
                    </div>
                </a>

                <a href="{{ route('products.index', ['category' => 'Brake System']) }}" class="text-decoration-none d-flex">
                    <div class="fw-bold text-pretty text-center py-3 flex-fill"
                         style="color: #dc2d34; border: 3px solid #dc2d34; border-radius: 15px; max-width: 250px;">
                        <img src="{{ asset('images/brake1.png') }}" alt="Brake System" class="img-fluid mb-2" style="max-height: 150px; object-fit: contain;">
                        <h5 class="fw-semibold">Brake System</h5>
                    </div>
                </a>

                <a href="{{ route('products.index', ['category' => 'Transmission']) }}" class="text-decoration-none d-flex">
                    <div class="fw-bold text-pretty text-center py-3 flex-fill"
                         style="color: #dc2d34; border: 3px solid #dc2d34; border-radius: 15px; max-width: 250px;">
                        <img src="{{ asset('images/transmission.png') }}" alt="Transmission" class="img-fluid mb-2" style="max-height: 150px; object-fit: contain;">
                        <h5 class="fw-semibold">Transmission</h5>
                    </div>
                </a>

                <a href="{{ route('products.index', ['category' => 'Tires & Wheels']) }}" class="text-decoration-none d-flex">
                    <div class="fw-bold text-pretty text-center py-3 flex-fill"
                         style="color: #dc2d34; border: 3px solid #dc2d34; border-radius: 15px; max-width: 250px;">
                        <img src="{{ asset('images/wheel.png') }}" alt="Tires & Wheels" class="img-fluid mb-2" style="max-height: 150px; object-fit: contain;">
                        <h5 class="fw-semibold">Tires & Wheels</h5>
                    </div>
                </a>

            </div>
        </div>

        {{-- CATEGORIES ROW 2 --}}
        <div class="container-fluid py-5 bg-white">
            <div class="d-flex justify-content-center flex-wrap gap-4 px-5">

                <a href="{{ route('products.index', ['category' => 'Suspension Parts']) }}" class="text-decoration-none d-flex">
                    <div class="fw-bold text-pretty text-center py-3 flex-fill"
                         style="color: #dc2d34; border: 3px solid #dc2d34; border-radius: 15px; max-width: 250px;">
                        <img src="{{ asset('images/suspension.png') }}" alt="Suspension Parts" class="img-fluid mb-2" style="max-height: 150px; min-height: 150px; object-fit: contain;">
                        <h5 class="fw-semibold">Suspension Parts</h5>
                    </div>
                </a>

                <a href="{{ route('products.index', ['category' => 'Lights']) }}" class="text-decoration-none d-flex">
                    <div class="fw-bold text-pretty text-center py-3 flex-fill"
                         style="color: #dc2d34; border: 3px solid #dc2d34; border-radius: 15px; max-width: 250px;">
                        <img src="{{ asset('images/headlights.png') }}" alt="Lights" class="img-fluid mb-2" style="max-height: 150px; object-fit: contain;">
                        <h5 class="fw-semibold">Lights</h5>
                    </div>
                </a>

                <a href="{{ route('products.index', ['category' => 'Body Components']) }}" class="text-decoration-none d-flex">
                    <div class="fw-bold text-pretty text-center py-3 flex-fill"
                         style="color: #dc2d34; border: 3px solid #dc2d34; border-radius: 15px; max-width: 250px;">
                        <img src="{{ asset('images/seats.png') }}" alt="Body Parts" class="img-fluid mb-2" style="max-height: 150px; object-fit: contain;">
                        <h5 class="fw-semibold">Body Components</h5>
                    </div>
                </a>

                <a href="{{ route('products.index', ['category' => 'Electrical Components']) }}" class="text-decoration-none d-flex">
                    <div class="fw-bold text-pretty text-center py-3 flex-fill"
                         style="color: #dc2d34; border: 3px solid #dc2d34; border-radius: 15px; max-width: 250px;">
                        <img src="{{ asset('images/battery.png') }}" alt="Electrical Components" class="img-fluid mb-2" style="max-height: 150px; object-fit: contain;">
                        <h5 class="fw-semibold">Electrical Components</h5>
                    </div>
                </a>

            </div>
        </div>

    </div>

    <!-- FEATURED PRODUCTS SECTION -->
    <div class="container py-5">
        <h2 class="text-center fw-bold mb-5" style="color: #dc2d34;">Featured Products</h2>

        <div class="row justify-content-center g-4">
            <div class="col-md-3 text-center p-3 shadow-sm rounded-3 bg-white card shadow-lg mt-4">
                <img src="{{ asset('images/bosch oil filter.png') }}" alt="Oil Filter" class="img-fluid mb-3 " style="max-height: 180px; object-fit: contain;">
                <h5 class="fw-bold">Premium Bosch Oil Filter</h5>
                <p class="text-muted">PKR 1,200</p>
                <a href="{{ route('products.show', ['slug' => 'oil-filter']) }}" class="btn btn-sm text-white" style="background-color: #dc2d34;">View Details</a>
            </div>

            <div class="col-md-3 text-center p-3 shadow-sm rounded-3 bg-white card shadow-lg mt-4">
                <img src="{{ asset('images/wagner brake pads.png') }}" alt="Brake Pads" class="img-fluid mb-3" style="max-height: 180px; object-fit: contain;">
                <h5 class="fw-bold">Wagner Brake Pads</h5>
                <p class="text-muted">PKR 3,500</p>
                <a href="{{ route('products.show', ['slug' => 'brake-pads']) }}" class="btn btn-sm text-white" style="background-color: #dc2d34;">View Details</a>
            </div>

            <div class="col-md-3 text-center p-3 shadow-sm rounded-3 bg-white card shadow-lg mt-4">
                <img src="{{ asset('images/sparkplug.png') }}" alt="Spark Plug" class="img-fluid mb-3" style="max-height: 180px; object-fit: contain;">
                <h5 class="fw-bold">Spark Plug</h5>
                <p class="text-muted">PKR 850</p>
                <a href="{{ route('products.show', ['slug' => 'spark-plug']) }}" class="btn btn-sm text-white" style="background-color: #dc2d34;">View Details</a>
            </div>

            <div class="col-md-3 text-center p-3 shadow-sm rounded-3 bg-white card shadow-lg mt-4">
                <img src="{{ asset('images/platinum battery.png') }}" alt="Car Battery" class="img-fluid mb-3" style="max-height: 180px; object-fit: contain;">
                <h5 class="fw-bold">Platinum Car Battery 12V</h5>
                <p class="text-muted">PKR 9,800</p>
                <a href="{{ route('products.show', ['slug' => 'car-battery']) }}" class="btn btn-sm text-white" style="background-color: #dc2d34;">View Details</a>
            </div>
        </div>
    </div>

    <br><br><br>

@endsection
