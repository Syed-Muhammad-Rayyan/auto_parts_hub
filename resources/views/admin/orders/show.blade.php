@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Order #{{ $order->id }}</h2>
            <a href="{{ route('admin.orders.index', ['status' => $currentStatus]) }}" class="btn btn-secondary">Back to Orders</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <h4>Customer Information</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Name:</th>
                        <td>{{ $order->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $order->email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $order->phone ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td>{{ $order->address ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h4>Order Information</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Status:</th>
                        <td>
                            <span class="badge bg-{{
                                $order->status === 'completed' ? 'success' :
                                ($order->status === 'shipped' ? 'info' :
                                ($order->status === 'cancelled' ? 'danger' : 'warning'))
                            }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Amount:</th>
                        <td>PKR {{ number_format($order->total_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Order Date:</th>
                        <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                    </tr>
                </table>

                <form action="{{ route('admin.orders.update', ['order' => $order->id, 'status' => $currentStatus]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Change Status:</label>
                        <select name="status" class="form-control">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>

        <h4 class="mt-4">Order Items</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name ?? 'N/A' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>PKR {{ number_format($item->price, 2) }}</td>
                        <td>PKR {{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



