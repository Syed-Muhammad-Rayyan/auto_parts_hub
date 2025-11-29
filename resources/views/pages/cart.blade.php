@extends('layouts.app')

@section('title', 'Cart - Auto Parts Hub')

@section('content')
    <div class="container py-5">
        <h2 class="fw-bold mb-4" style="color: #dc2d34;">Your Cart</h2>

        @if(empty($cart) || count($cart) === 0)
            <p>Your cart is empty.</p>
        @else
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-end">Price</th>
                        <th class="text-end">Qty</th>
                        <th class="text-end">Total</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cart as $key => $item)
                        @php $total = $item['price'] * $item['quantity']; @endphp
                        <tr>
                            <td class="d-flex align-items-center gap-3">
                                <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" width="64" height="64" class="rounded-image shadow-sm">
                                <div>
                                    <div class="fw-semibold">{{ $item['name'] }}</div>
                                    <div class="text-muted small">PKR {{ number_format($item['price']) }}</div>
                                </div>
                            </td>
                            <td class="text-end">PKR {{ number_format($item['price']) }}</td>

                            <!-- Quantity Update Form -->
                            <td class="text-end">
                                <form action="{{ route('cart.update') }}" method="POST" class="d-flex justify-content-end align-items-center gap-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $key }}">
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm" style="width: 60px;">
                                    <button type="submit" class="btn btn-sm btn-danger">Update</button>
                                </form>
                            </td>

                            <td class="text-end">PKR {{ number_format($total) }}</td>

                            <!-- Remove Item Form -->
                            <td class="text-end">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $key }}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @php $grandTotal += $total; @endphp
                    @endforeach
                    </tbody>

                </table>
            </div>

            <div class="text-end mt-4">
                <h4 class="fw-bold">Grand Total: PKR {{ number_format($grandTotal) }}</h4>
                <form action="{{ route('checkout.index') }}" method="GET">
                    <button type="submit" class="btn text-white mt-2 px-4" style="background-color: #dc2d34;">
                        Proceed To Checkout
                    </button>
                </form>

            </div>
        @endif
    </div>
@endsection
