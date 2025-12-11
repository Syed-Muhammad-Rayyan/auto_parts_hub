@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container">
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1" style="color: #dc2d34;">Manage Orders</h2>
                    <p class="text-muted mb-0">Process and track customer orders</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                </a>
            </div>

        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link {{ $status === 'pending' ? 'active' : '' }}" 
                   href="{{ route('admin.orders.index', ['status' => 'pending']) }}">Pending Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $status === 'completed' ? 'active' : '' }}" 
                   href="{{ route('admin.orders.index', ['status' => 'completed']) }}">Completed Orders</a>
            </li>
        </ul>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->name ?? 'N/A' }}</td>
                        <td>{{ $order->email ?? 'N/A' }}</td>
                        <td>PKR {{ number_format($order->total_amount, 2) }}</td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', ['order' => $order->id, 'status' => $status]) }}" 
                               class="btn btn-primary btn-sm">View Details</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No {{ $status }} orders found.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $orders->links() }}
        </div>
    </div>
@endsection



