@extends('layouts.admin')

@section('title', 'Review Details - Admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0 fw-bold" style="color: #dc2d34;">Review Details</h2>
            <p class="text-muted mb-0">Review submitted by {{ $review->customer_name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.reviews.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Reviews
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                <i class="fas fa-home me-2"></i>Dashboard
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card soft-card p-4 mb-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h4 class="mb-1">{{ $review->customer_name }}</h4>
                        <p class="text-muted mb-1">{{ $review->customer_email }}</p>
                        <small class="text-muted">Submitted on {{ $review->created_at->format('F d, Y \a\t h:i A') }}</small>
                    </div>
                    <div class="text-end">
                        <div class="text-warning fs-5 mb-2">
                            {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                        </div>
                        <small class="text-muted">{{ $review->rating }}/5 stars</small>
                    </div>
                </div>

                @if($review->title)
                    <h5 class="mb-3">{{ $review->title }}</h5>
                @endif

                <div class="mb-4">
                    <h6>Review Comment:</h6>
                    <p class="lead">{{ $review->comment }}</p>
                </div>

                @if($review->images && count($review->images) > 0)
                    <div class="mb-4">
                        <h6>Uploaded Photos:</h6>
                        <div class="row g-3">
                            @foreach($review->images as $image)
                                <div class="col-md-3 col-sm-4">
                                    <img src="{{ asset('images/' . $image) }}"
                                         alt="Review photo"
                                         class="img-thumbnail w-100"
                                         style="height: 120px; object-fit: cover; cursor: pointer;"
                                         onclick="openImageModal('{{ asset('images/' . $image) }}')">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Product Info -->
            <div class="admin-card soft-card p-4 mb-4">
                <h6 class="mb-3">Product Information</h6>
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('images/' . $review->product->image) }}"
                         alt="{{ $review->product->name }}"
                         class="img-thumbnail me-3"
                         style="width: 60px; height: 60px; object-fit: cover;">
                    <div>
                        <h6 class="mb-0">{{ $review->product->name }}</h6>
                        <small class="text-muted">{{ $review->product->category }}</small>
                    </div>
                </div>
                <p class="mb-2"><strong>Price:</strong> PKR {{ number_format($review->product->price) }}</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('products.show', ['slug' => $review->product->slug]) }}"
                       target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-external-link-alt me-1"></i>View on Website
                    </a>
                    <a href="{{ route('admin.products.show', $review->product->id) }}"
                       class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-edit me-1"></i>View Product
                    </a>
                </div>
            </div>

            <!-- Review Stats -->
            <div class="admin-card soft-card p-4">
                <h6 class="mb-3">Review Statistics</h6>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="h4 text-primary mb-1">{{ $review->rating }}</div>
                        <small class="text-muted">Rating</small>
                    </div>
                    <div class="col-6">
                        <div class="h4 text-info mb-1">{{ $review->product->reviewCount() }}</div>
                        <small class="text-muted">Total Reviews</small>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <div class="h5 text-success mb-1">{{ number_format($review->product->averageRating(), 1) }}</div>
                    <small class="text-muted">Average Rating</small>
                </div>
            </div>
        </div>
    </div>
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
