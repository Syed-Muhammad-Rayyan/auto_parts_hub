@extends('layouts.app')

@section('title', 'Products - Auto Parts Hub')

@section('content')
    <div class="container py-5">

        {{-- Display current category or All Products --}}
        @if($category)
            <h2 class="text-center fw-bold mb-5" style="color: #dc2d34;">Category: {{ $category }}</h2>
        @else
            <h2 class="text-center fw-bold mb-5" style="color: #dc2d34;">All Products</h2>
        @endif

        <div class="row justify-content-center g-4">
            @forelse($products as $product)
                <div class="col-md-3 text-center p-3 shadow-sm rounded-3 bg-white card shadow-lg mt-4">
                    <img src="{{ asset('images/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="img-fluid mb-3"
                         style="max-height: 180px; object-fit: contain;">
                    <h5 class="fw-bold">{{ $product->name }}</h5>
                    <p class="text-muted">PKR {{ number_format($product->price) }}</p>
                    <a href="{{ route('products.show', ['slug' => $product->slug]) }}"
                       class="btn btn-sm text-white"
                       style="background-color: #dc2d34;">View Details</a>
                </div>
            @empty
                <p class="text-center fw-semibold">No products found in this category.</p>
            @endforelse
        </div>

    </div>
@endsection
