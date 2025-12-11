@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container">
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1" style="color: #dc2d34;">Contact Messages</h2>
                    <p class="text-muted mb-0">Respond to customer inquiries</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                </a>
            </div>

        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link {{ $status === 'pending' ? 'active' : '' }}" 
                   href="{{ route('admin.contacts.index', ['status' => 'pending']) }}">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $status === 'replied' ? 'active' : '' }}" 
                   href="{{ route('admin.contacts.index', ['status' => 'replied']) }}">Replied</a>
            </li>
        </ul>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->created_at->format('M d, Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $message->status === 'replied' ? 'success' : 'warning' }}">
                                {{ ucfirst($message->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.contacts.show', ['contact' => $message->id, 'status' => $status]) }}" 
                               class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No {{ $status }} messages found.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $messages->links() }}
        </div>
    </div>
@endsection



