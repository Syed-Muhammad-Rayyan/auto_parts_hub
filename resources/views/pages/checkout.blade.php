@extends('layouts.app')

@section('title', 'Checkout - Auto Parts Hub')

@section('content')
    <div class="container my-5">
        <h2 class="hb mb-4 text-center">Checkout</h2>

        @if(empty($cartItems) || count($cartItems) == 0)
            <div class="soft-card text-center p-5">
                <p class="mb-0 fs-5">🛒 Your cart is empty. <a href="{{ route('products.index') }}">Browse products</a></p>
            </div>
        @else
            @php $total = 0; @endphp
            <div class="row g-4">
                <!-- Order summary -->
                <div class="col-lg-6">
                    <div class="soft-card p-4 shadow-sm">
                        <h5 class="fw-bold mb-3 text-center">Order Summary</h5>

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle">
                                <thead class="table-light">
                                <tr>
                                    <th>Product</th>
                                    <th class="text-end">Qty</th>
                                    <th class="text-end">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cartItems as $productId => $item)
                                    @php $subtotal = $item['price'] * $item['quantity']; @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset('images/' . $item['image']) }}"
                                                     alt="{{ $item['name'] }}" width="64" height="64"
                                                     class="rounded-image shadow-sm">
                                                <div>
                                                    <div class="fw-semibold">{{ $item['name'] }}</div>
                                                    <div class="text-muted small">PKR {{ number_format($item['price']) }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">{{ $item['quantity'] }}</td>
                                        <td class="text-end">PKR {{ number_format($subtotal) }}</td>
                                    </tr>
                                    @php $total += $subtotal; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-end mt-3">
                            <h5 class="fw-bold">Grand Total:
                                <span style="color: var(--brand)">
                                PKR {{ number_format($total) }}
                            </span>
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Delivery form -->
                <div class="col-lg-6">
                    <div class="soft-card p-4 shadow-sm">
                        <h5 class="fw-bold mb-3 text-center">Delivery Information</h5>
                        <form action="{{ route('checkout.submit') }}" method="POST" id="checkoutForm">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input name="name" type="text" class="form-control rounded-pill p-2" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input name="email" type="email" class="form-control rounded-pill p-2" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <input name="phone" type="text" class="form-control rounded-pill p-2" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Delivery Address</label>
                                <textarea name="address" class="form-control rounded-4 p-2" rows="3" required></textarea>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Back to Cart</a>
                                <button type="submit" class="btn text-white px-4 py-2 rounded-pill" style="background-color: #dc2d34;">Place Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection



@section('styles')
    <style>
        .soft-card {
            border-radius: 20px;
            background-color: #ffffff;
            border: 1px solid #eaeaea;
            transition: 0.3s ease;
        }

        .soft-card:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.07);
            transform: translateY(-2px);
        }

        .rounded-image {
            border-radius: 14px;
            object-fit: cover;
        }

        .form-control {
            border: 1px solid #ccc;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #dc2d34;
            box-shadow: 0 0 0 0.15rem rgba(220, 45, 52, 0.25);
        }
    </style>
@endsection


{{--@section('scripts')--}}
{{--    <!-- SweetAlert2 + Animation -->--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
{{--    <link rel="stylesheet"--}}
{{--          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>--}}

{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function() {--}}
{{--            const form = document.getElementById('checkoutForm');--}}
{{--            if (form) {--}}
{{--                form.addEventListener('submit', function(e) {--}}
{{--                    e.preventDefault();--}}

{{--                    Swal.fire({--}}
{{--                        title: '🎉 Order Placed Successfully!',--}}
{{--                        text: 'Thank you for shopping with Auto Parts Hub! Your order is being processed.',--}}
{{--                        icon: 'success',--}}
{{--                        confirmButtonText: 'Great!',--}}
{{--                        confirmButtonColor: '#dc2d34',--}}
{{--                        background: '#fff',--}}
{{--                        color: '#333',--}}
{{--                        showClass: {--}}
{{--                            popup: 'animate__animated animate__fadeInDown'--}}
{{--                        },--}}
{{--                        hideClass: {--}}
{{--                            popup: 'animate__animated animate__fadeOutUp'--}}
{{--                        }--}}
{{--                    }).then(() => {--}}
{{--                        e.target.submit(); // submit after alert--}}
{{--                    });--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
