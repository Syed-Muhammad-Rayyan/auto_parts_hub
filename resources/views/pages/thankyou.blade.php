@extends('layouts.app')

@section('title', 'Order Placed - Auto Parts Hub')

@section('content')
    <div class="container text-center my-5">
        <div class="soft-card p-5 mx-auto" style="max-width: 600px;">
            <h1 class="fw-bold mb-3" style="color: #dc2d34;">🎉 Thank You!</h1>
            <p class="fs-5">Your order has been placed successfully.</p>
            <p class="text-muted">We’ll contact you soon for delivery confirmation.</p>

            <h4 class="fw-semibold mt-4">Total Paid:
                <span style="color: #dc2d34;">PKR {{ number_format($total) }}</span>
            </h4>

            <a href="{{ route('products.index') }}" class="btn text-white mt-4 px-4 py-2 rounded-pill" style="background-color: #dc2d34;">
                Continue Shopping
            </a>
        </div>
    </div>
@endsection
