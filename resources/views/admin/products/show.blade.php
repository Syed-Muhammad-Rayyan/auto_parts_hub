@extends('layouts.admin')

@section('title', $product->name . ' - Admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0 fw-bold" style="color: #dc2d34;">Product Details</h2>
            <p class="text-muted mb-0">{{ $product->name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline-primary">
                <i class="fas fa-edit me-2"></i>Edit Product
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Products
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                <i class="fas fa-home me-2"></i>Dashboard
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card soft-card p-4 mb-4">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('images/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="img-fluid rounded mb-3"
                             style="max-height: 250px; object-fit: contain;">
                    </div>
                    <div class="col-md-8">
                        <h3 class="mb-3">{{ $product->name }}</h3>
                        <div class="mb-3">
                            <span class="badge bg-primary fs-6">{{ $product->categoryRelation->name ?? 'No Category' }}</span>
                        </div>
                        <h4 class="text-success mb-3">PKR {{ number_format($product->price) }}</h4>
                        <p class="text-muted mb-2"><strong>Short Description:</strong></p>
                        <p>{{ $product->short }}</p>
                    </div>
                </div>
            </div>

            <div class="admin-card soft-card p-4">
                <h5 class="mb-3">Full Description</h5>
                <p>{{ $product->description }}</p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-card soft-card p-4 mb-4">
                <h6 class="mb-3">Product Information</h6>
                <table class="table table-sm">
                    <tr>
                        <td><strong>Product ID:</strong></td>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Slug:</strong></td>
                        <td><code>{{ $product->slug }}</code></td>
                    </tr>
                    <tr>
                        <td><strong>Category:</strong></td>
                        <td>{{ $product->categoryRelation->name ?? 'No Category' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Price:</strong></td>
                        <td>PKR {{ number_format($product->price) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $product->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $product->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <div class="admin-card soft-card p-4">
                <h6 class="mb-3">Actions</h6>
                <div class="d-grid gap-2">
                    <a href="{{ route('products.show', ['slug' => $product->slug]) }}"
                       target="_blank" class="btn btn-outline-info">
                        <i class="fas fa-external-link-alt me-2"></i>View on Website
                    </a>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Product
                    </a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
