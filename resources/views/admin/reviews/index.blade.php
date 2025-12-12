@extends('layouts.admin')

@section('title', 'View Reviews - Admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0 fw-bold" style="color: #dc2d34;">Customer Reviews</h2>
            <p class="text-muted mb-0">View and monitor customer reviews</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
        </a>
    </div>

    <!-- Reviews Summary -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body text-center py-3">
                    <h5 class="mb-2">Customer Reviews Overview</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="h3 text-primary">{{ \App\Models\Review::count() }}</div>
                            <small class="text-muted">Total Reviews</small>
                        </div>
                        <div class="col-md-4">
                            <div class="h3 text-success">{{ \App\Models\Review::avg('rating') ? number_format(\App\Models\Review::avg('rating'), 1) : '0.0' }}</div>
                            <small class="text-muted">Average Rating</small>
                        </div>
                        <div class="col-md-4">
                            <div class="h3 text-info">{{ \App\Models\Review::whereNotNull('images')->where('images', '!=', '[]')->count() }}</div>
                            <small class="text-muted">Reviews with Photos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                <div class="text-warning fs-5 mb-2">
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
                                <a href="{{ route('admin.products.show', $review->product->id) }}" class="text-decoration-none">
                                    {{ $review->product->name }}
                                </a>
                            </div>
                            <a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye me-1"></i>View Details
                            </a>
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
            <h4 class="text-muted">No reviews found</h4>
            <p class="text-muted">There are currently no customer reviews in the system.</p>
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
