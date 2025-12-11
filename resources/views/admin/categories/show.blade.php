@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Category: {{ $category->name }}</h2>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to Categories</a>
        </div>

        @if($category->description)
            <p class="text-muted">{{ $category->description }}</p>
        @endif

        <h4 class="mt-4">Products in this Category ({{ $products->count() }})</h4>

        @if($products->count() > 0)
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>PKR {{ number_format($product->price) }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('images/'.$product->image) }}" width="80">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">No products in this category yet.</p>
        @endif
    </div>
@endsection



