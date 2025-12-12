@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2" style="color: #dc2d34;">Welcome, {{ session('admin_name') }}</h2>
                <p class="text-muted">Manage your Auto Parts Hub administration panel</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Manage Products -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
                        <div class="admin-card soft-card text-center p-4 h-100">
                            <div class="admin-icon mb-3">
                                <i class="fas fa-box fa-3x" style="color: #007bff;"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Manage Products</h5>
                            <p class="text-muted small mb-3">Add, edit, and manage your product inventory</p>
                            <span class="btn btn-primary w-100">Go to Products</span>
                        </div>
                    </a>
                </div>

                <!-- Manage Categories -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ route('admin.categories.index') }}" class="text-decoration-none">
                        <div class="admin-card soft-card text-center p-4 h-100">
                            <div class="admin-icon mb-3">
                                <i class="fas fa-tags fa-3x" style="color: #28a745;"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Manage Categories</h5>
                            <p class="text-muted small mb-3">Organize products into categories</p>
                            <span class="btn btn-success w-100">Go to Categories</span>
                        </div>
                    </a>
                </div>

                <!-- Manage Orders -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="text-decoration-none">
                        <div class="admin-card soft-card text-center p-4 h-100">
                            <div class="admin-icon mb-3">
                                <i class="fas fa-shopping-cart fa-3x" style="color: #ffc107;"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Manage Orders</h5>
                            <p class="text-muted small mb-3">Process and track customer orders</p>
                            <span class="btn btn-warning w-100">Go to Orders</span>
                        </div>
                    </a>
                </div>

                <!-- Contact Messages -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ route('admin.contacts.index', ['status' => 'pending']) }}" class="text-decoration-none">
                        <div class="admin-card soft-card text-center p-4 h-100">
                            <div class="admin-icon mb-3">
                                <i class="fas fa-envelope fa-3x" style="color: #17a2b8;"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Contact Messages</h5>
                            <p class="text-muted small mb-3">Respond to customer inquiries</p>
                            <span class="btn btn-info w-100">Go to Messages</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Quick Stats Row -->
            <div class="row g-4 mt-5 justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="stats-card soft-card text-center p-3">
                        <div class="stats-number fw-bold fs-2 mb-2" style="color: #dc2d34;">{{ $stats['total_products'] }}</div>
                        <div class="stats-label text-muted">Total Products</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="stats-card soft-card text-center p-3">
                        <div class="stats-number fw-bold fs-2 mb-2" style="color: #ffc107;">{{ $stats['pending_orders'] }}</div>
                        <div class="stats-label text-muted">Pending Orders</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="stats-card soft-card text-center p-3">
                        <div class="stats-number fw-bold fs-2 mb-2" style="color: #17a2b8;">{{ $stats['shipped_orders'] }}</div>
                        <div class="stats-label text-muted">Shipped Orders</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="stats-card soft-card text-center p-3">
                        <div class="stats-number fw-bold fs-2 mb-2" style="color: #28a745;">{{ $stats['completed_orders'] }}</div>
                        <div class="stats-label text-muted">Completed Orders</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="stats-card soft-card text-center p-3">
                        <div class="stats-number fw-bold fs-2 mb-2" style="color: #dc3545;">{{ $stats['cancelled_orders'] }}</div>
                        <div class="stats-label text-muted">Cancelled Orders</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="stats-card soft-card text-center p-3">
                        <div class="stats-number fw-bold fs-2 mb-2" style="color: #6f42c1;">{{ $stats['new_messages'] }}</div>
                        <div class="stats-label text-muted">New Messages</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="stats-card soft-card text-center p-3">
                        <div class="stats-number fw-bold fs-2 mb-2" style="color: #20c997;">PKR {{ number_format($stats['total_revenue']) }}</div>
                        <div class="stats-label text-muted">Total Revenue</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
