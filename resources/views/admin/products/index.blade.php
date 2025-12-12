@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container">
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1" style="color: #dc2d34;">Manage Products</h2>
                    <p class="text-muted mb-0">Add, edit, and organize your product inventory</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                    </a>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-brand">
                        <i class="fas fa-plus me-2"></i>Add New Product
                    </a>
                </div>
            </div>

        @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show soft-card" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
        @endif

            <div class="soft-card">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
            <tr>
                            <th class="border-0 fw-bold">Image</th>
                            <th class="border-0 fw-bold">Product Details</th>
                            <th class="border-0 fw-bold">Category</th>
                            <th class="border-0 fw-bold">Price</th>
                            <th class="border-0 fw-bold text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                                <td class="align-middle">
                        @if($product->image)
                                        <img src="{{ asset('images/'.$product->image) }}" class="rounded" width="60" height="60" style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                        @endif
                    </td>
                                <td class="align-middle">
                                    <div class="fw-semibold">{{ $product->name }}</div>
                                    <small class="text-muted">{{ Str::limit($product->description ?? 'No description', 50) }}</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-primary">{{ $product->category }}</span>
                                </td>
                                <td class="align-middle fw-bold text-primary">
                                    PKR {{ number_format($product->price) }}
                                </td>
                                <td class="align-middle text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                        </form>
                                    </div>
                    </td>
                </tr>
            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No products found</h5>
                                    <p class="text-muted mb-0">Start by adding your first product.</p>
                                </td>
                            </tr>
            @endforelse
            </tbody>
        </table>
                </div>
            </div>


        </div>
    </div>
@endsection
