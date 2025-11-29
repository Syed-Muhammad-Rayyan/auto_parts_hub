@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Welcome, {{ session('admin_name') }}</h2>

        <!-- Logout Form -->
        <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

        <hr>

        <h3>Admin Panel</h3>
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Manage Products</a>
    </div>
@endsection
