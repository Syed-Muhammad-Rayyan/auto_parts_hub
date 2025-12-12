@extends('layouts.admin')

@section('title', 'Manage Reviews - Admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0 fw-bold" style="color: #dc2d34;">Manage Reviews</h2>
            <p class="text-muted mb-0">Review and moderate customer reviews</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
        </a>
    </div>

    <!-- Status Tabs -->
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link {{ $status === 'pending' ? 'active' : '' }}"
               href="{{ route('admin.reviews.index', ['status' => 'pending']) }}">
                Pending Reviews
                <span class="badge bg-warning ms-1">{{ \App\Models\Review::where('status', 'pending')->count() }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status === 'approved' ? 'active' : '' }}"
               href="{{ route('admin.reviews.index', ['status' => 'approved']) }}">
                Approved Reviews
                <span class="badge bg-success ms-1">{{ \App\Models\Review::where('status', 'approved')->count() }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status === 'rejected' ? 'active' : '' }}"
               href="{{ route('admin.reviews.index', ['status' => 'rejected']) }}">
                Rejected Reviews
                <span class="badge bg-danger ms-1">{{ \App\Models\Review::where('status', 'rejected')->count() }}</span>
            </a>
        </li>
    </ul>

    @if($reviews->count() > 0)
        <div class="row">
            @foreach($reviews as $review)
                <div class="col-xl-6 mb-4">
                    <div class="admin-card soft-card p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="mb-1">{{ $review->customer_name }}</h5>
                                <small class="text-muted">{{ $review->customer_email }}</small>
                            </div>
                            <div class="text-end">
                                <div class="text-warning mb-1">
                                    {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                                </div>
                                <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                            </div>
                        </div>

                        @if($review->title)
                            <h6 class="mb-2">{{ $review->title }}</h6>
                        @endif

                        <p class="mb-3">{{ $review->comment }}</p>

                        @if($review->images && count($review->images) > 0)
                            <div class="mb-3">
                                <strong>Photos:</strong>
                                <div class="d-flex flex-wrap gap-2 mt-2">
                                    @foreach($review->images as $image)
                                        <img src="{{ asset('images/' . $image) }}"
                                             alt="Review photo"
                                             class="img-thumbnail"
                                             style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;"
                                             onclick="openImageModal('{{ asset('images/' . $image) }}')">
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Product:</strong>
                                <a href="{{ route('admin.products.edit', $review->product->id) }}" class="text-decoration-none">
                                    {{ $review->product->name }}
                                </a>
                            </div>
                            <div class="d-flex gap-2">
                                @if($review->status === 'pending')
                                    <form action="{{ route('admin.reviews.update', $review) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check me-1"></i>Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.reviews.update', $review) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-times me-1"></i>Reject
                                        </button>
                                    </form>
                                @elseif($review->status === 'approved')
                                    <form action="{{ route('admin.reviews.update', $review) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            <i class="fas fa-ban me-1"></i>Reject
                                        </button>
                                    </form>
                                @elseif($review->status === 'rejected')
                                    <form action="{{ route('admin.reviews.update', $review) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check me-1"></i>Approve
                                        </button>
                                    </form>
                                @endif

                                <a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>View
                                </a>

                                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this review?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        {{ $reviews->links() }}
    @else
        <div class="text-center py-5">
            <i class="fas fa-comments fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">No {{ $status }} reviews found</h4>
            <p class="text-muted">There are currently no reviews with this status.</p>
        </div>
    @endif
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-0">
                <img id="modalImage" src="" alt="Review image" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
function openImageModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    new bootstrap.Modal(document.getElementById('imageModal')).show();
}
</script>
@endsection
