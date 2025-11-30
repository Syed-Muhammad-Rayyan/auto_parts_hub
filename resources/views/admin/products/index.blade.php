@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Products</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Add New Product</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>PKR {{ $product->price }}</td>
                    <td>{{ $product->category }}</td> {{-- NEW --}}

                    <td>
                        @if($product->image)
                            <img src="{{ asset('images/'.$product->image) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No products found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
