@extends('layouts.app')

@section('title', 'Products - Auto Parts Hub')

@section('content')
    <div class="container-fluid py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container">

        {{-- Display current category or All Products --}}
        @if($category)
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-2" style="color: #dc2d34;">Category: {{ $category }}</h2>
                    <p class="text-muted">Browse our collection of {{ strtolower($category) }}</p>
                </div>
        @else
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-2" style="color: #dc2d34;">All Products</h2>
                    <p class="text-muted">Discover our complete range of automotive parts</p>
                </div>
        @endif

            {{-- Category Filter Buttons --}}
            <div class="d-flex justify-content-center flex-wrap gap-2 mb-5">
                <a href="{{ route('products.index') }}"
                   class="btn {{ !$category ? 'btn-brand' : 'btn-outline-primary' }} btn-sm">
                    All Products
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('products.index', ['category' => $cat->name]) }}"
                   class="btn {{ $category == $cat->name ? 'btn-brand' : 'btn-outline-primary' }} btn-sm">
                    {{ $cat->name }}
                </a>
                @endforeach

{{--                </a>--}}
{{--                <a href="{{ route('products.index', ['category' => 'Body Components']) }}"--}}
{{--                   class="btn {{ $category == 'Body Components' ? 'btn-brand' : 'btn-outline-primary' }} btn-sm">--}}
{{--                    Body Parts--}}
{{--                </a>--}}
{{--                <a href="{{ route('products.index', ['category' => 'Electrical Components']) }}"--}}
{{--                   class="btn {{ $category == 'Electrical Components' ? 'btn-brand' : 'btn-outline-primary' }} btn-sm">--}}
{{--                    Electrical--}}
{{--                </a>--}}
            </div>

            <div class="row g-4">
            @forelse($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="product-card soft-card">
                            <div class="product-image-container">
                    <img src="{{ asset('images/' . $product->image) }}"
                         alt="{{ $product->name }}"
                                     class="product-image">
                            </div>
                            <div class="product-content">
                                <div>
                                    <h6 class="fw-bold mb-2">{{ $product->name }}</h6>
                                    <span class="badge bg-primary mb-2">{{ $product->categoryRelation->name ?? 'Uncategorized' }}</span>
                                    <p class="text-muted small mb-3">{{ Str::limit($product->description ?? 'High-quality automotive part', 60) }}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-primary fs-6">PKR {{ number_format($product->price) }}</span>
                    <a href="{{ route('products.show', ['slug' => $product->slug]) }}"
                                       class="btn btn-brand btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                </div>
            @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">No products found</h4>
                            <p class="text-muted">Try selecting a different category or browse all products.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-brand">View All Products</a>
                        </div>
                    </div>
            @endforelse
        </div>


        </div>
    </div>
@endsection
