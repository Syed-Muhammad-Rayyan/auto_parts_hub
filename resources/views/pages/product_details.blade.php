@extends('layouts.app')

@section('title', $product->name . ' - Auto Parts Hub')

@section('content')
    <div class="container py-5">
        <div class="row align-items-center g-4">
            <!-- Product Image -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="img-fluid"
                     style="max-height: 400px; object-fit: contain;">
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h2 class="fw-bold" style="color: #dc2d34;">{{ $product->name }}</h2>
                <p class="text-muted small">{{ $product->short }}</p>
                <h3 class="mt-3">PKR {{ number_format($product->price) }}</h3>

                <hr>

                <h5 class="fw-semibold">Product Description</h5>
                <p>{{ $product->description }}</p>

                <!-- Add to Cart Form -->
                <div class="mt-4">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <!-- Pass the product ID to the controller -->
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="mb-3">
                            <label for="quantity" class="form-label fw-bold">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" class="form-control w-25" min="1" value="1" required>
                        </div>

                        <button type="submit" class="btn text-white px-4" style="background-color: #dc2d34;">
                            Add to Cart
                        </button>
                    </form>


                @if(session('success'))
                        <div class="alert alert-success mt-3">
                            ✅ {{ session('success') }}
                        </div>
                    @endif
                </div>

                <!-- Back to Products -->
                <div class="mt-3">
                    <a href="{{ route('products.index') }}" class="text-muted">&larr; Back to Products</a>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="container mt-5">
            <h3 class="mb-4 fw-bold" style="color: #dc2d34;">Customer Reviews</h3>

            <!-- Where reviews will appear -->
            <div id="reviewsList" class="mb-4"></div>

            <!-- Write a Review -->
            <h4 class="mb-3 fw-semibold">Write a Review</h4>
            <form id="reviewForm" class="p-4 shadow-sm rounded-3 bg-white" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label fw-bold">Your Name *</label>
                            <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Enter your name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="customer_email" class="form-label fw-bold">Your Email *</label>
                            <input type="email" id="customer_email" name="customer_email" class="form-control" placeholder="Enter your email" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label fw-bold">Rating *</label>
                    <select id="rating" name="rating" class="form-select" required>
                        <option value="">Select Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                        <option value="4">⭐⭐⭐⭐ - Good</option>
                        <option value="3">⭐⭐⭐ - Average</option>
                        <option value="2">⭐⭐ - Poor</option>
                        <option value="1">⭐ - Terrible</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Review Title (Optional)</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Summarize your experience" maxlength="255">
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label fw-bold">Your Review *</label>
                    <textarea id="comment" name="comment" class="form-control" rows="4" placeholder="Share details of your experience with this product..." required minlength="10" maxlength="1000"></textarea>
                    <div class="form-text">Minimum 10 characters, maximum 1000 characters.</div>
                </div>

                <div class="mb-3">
                    <label for="images" class="form-label fw-bold">Upload Photos (Optional)</label>
                    <div class="image-upload-container" onclick="document.getElementById('images-input').click()">
                        <input type="file" name="images[]" id="images-input" class="form-control d-none" accept="image/jpeg,image/png,image/gif" multiple>
                        <p class="text-muted mb-0"><i class="fas fa-cloud-upload-alt fa-2x mb-2"></i><br>Click to upload photos (Max 5 images, 2MB each)</p>
                    </div>
                    <div id="image-preview-container" class="mt-3 d-flex flex-wrap gap-2" style="display: none;"></div>
                    <small class="form-text text-muted">Allowed types: JPG, PNG, GIF. Max 5 images, 2MB each.</small>
                </div>

                <button type="submit" class="btn text-white px-4 py-2" style="background-color: #dc2d34;">
                    <i class="fas fa-paper-plane me-2"></i>Submit Review
                </button>
            </form>

            <!-- Success Message -->
            <div id="reviewSuccess" class="alert alert-success mt-3" style="display: none;">
                ✅ Thank you for your review!
            </div>
        </div>
    </div>

    <!-- JS for Reviews -->
    <script>
        // Image preview functionality
        document.getElementById('images-input').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('image-preview-container');
            const files = event.target.files;

            previewContainer.innerHTML = '';

            if (files.length > 0) {
                previewContainer.style.display = 'flex';

                Array.from(files).forEach((file, index) => {
                    if (file && index < 5) { // Limit to 5 images
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const imageDiv = document.createElement('div');
                            imageDiv.className = 'position-relative';
                            imageDiv.innerHTML = `
                                <img src="${e.target.result}" alt="Preview" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="removeImage(this, ${index})">
                                    <i class="fas fa-times"></i>
                                </button>
                            `;
                            previewContainer.appendChild(imageDiv);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            } else {
                previewContainer.style.display = 'none';
            }
        });

        function removeImage(button, index) {
            const input = document.getElementById('images-input');
            const dt = new DataTransfer();

            // Remove the file from input
            for (let i = 0; i < input.files.length; i++) {
                if (i !== index) {
                    dt.items.add(input.files[i]);
                }
            }
            input.files = dt.files;

            // Remove preview
            button.parentElement.remove();

            // Hide container if no images left
            const previewContainer = document.getElementById('image-preview-container');
            if (previewContainer.children.length === 0) {
                previewContainer.style.display = 'none';
            }

            // Trigger change event to update preview
            input.dispatchEvent(new Event('change'));
        }

        // Form submission
        document.getElementById("reviewForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            // Disable button and show loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Submitting...';

            fetch(`{{ route("products.reviews.store", $product) }}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showAlert('success', data.message);

                    // Reset form
                    this.reset();
                    document.getElementById('image-preview-container').style.display = 'none';
                    document.getElementById('image-preview-container').innerHTML = '';

                    // Reload reviews
                    loadReviews();
                } else {
                    showAlert('danger', 'Failed to submit review. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('danger', 'An error occurred. Please try again.');
            })
            .finally(() => {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });

        // Load reviews function
        function loadReviews() {
            fetch(`{{ route("products.reviews", $product) }}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const reviewsList = document.getElementById('reviewsList');
                    reviewsList.innerHTML = '';

                    if (data.reviews.data.length === 0) {
                        reviewsList.innerHTML = '<div class="text-center text-muted py-4"><i class="fas fa-comments fa-2x mb-2"></i><br>No reviews yet. Be the first to review this product!</div>';
                        return;
                    }

                    // Show average rating and total reviews
                    if (data.average_rating > 0) {
                        const summaryDiv = document.createElement('div');
                        summaryDiv.className = 'mb-4 p-3 bg-light rounded';
                        summaryDiv.innerHTML = `
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <h4 class="mb-0">${data.average_rating.toFixed(1)}</h4>
                                    <div class="text-warning">${"★".repeat(Math.floor(data.average_rating))}${"☆".repeat(5 - Math.floor(data.average_rating))}</div>
                                </div>
                                <div>
                                    <strong>${data.total_reviews} reviews</strong>
                                </div>
                            </div>
                        `;
                        reviewsList.appendChild(summaryDiv);
                    }

                    // Display reviews
                    data.reviews.data.forEach(review => {
                        const reviewDiv = document.createElement('div');
                        reviewDiv.className = 'border p-3 rounded mb-3';

                        let imagesHtml = '';
                        if (review.images && review.images.length > 0) {
                            imagesHtml = '<div class="mt-3"><strong>Photos:</strong><div class="d-flex flex-wrap gap-2 mt-2">';
                            review.images.forEach(image => {
                                imagesHtml += `<img src="/images/${image}" alt="Review photo" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;" onclick="openImageModal('/images/${image}')">`;
                            });
                            imagesHtml += '</div></div>';
                        }

                        reviewDiv.innerHTML = `
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong>${review.customer_name}</strong>
                                    <div class="text-warning">${"★".repeat(review.rating)}${"☆".repeat(5 - review.rating)}</div>
                                    ${review.title ? `<h6 class="mt-1">${review.title}</h6>` : ''}
                                    <p class="mt-2">${review.comment}</p>
                                    ${imagesHtml}
                                </div>
                                <small class="text-muted">${new Date(review.created_at).toLocaleDateString()}</small>
                            </div>
                        `;

                        reviewsList.appendChild(reviewDiv);
                    });

                    // Add pagination if needed
                    if (data.reviews.last_page > 1) {
                        const paginationDiv = document.createElement('div');
                        paginationDiv.className = 'd-flex justify-content-center mt-3';
                        paginationDiv.innerHTML = `
                            <nav aria-label="Review pagination">
                                <ul class="pagination">
                                    ${data.reviews.prev_page_url ? `<li class="page-item"><a class="page-link" href="#" onclick="loadReviewsPage(${data.reviews.current_page - 1})">Previous</a></li>` : ''}
                                    <li class="page-item active"><span class="page-link">${data.reviews.current_page}</span></li>
                                    ${data.reviews.next_page_url ? `<li class="page-item"><a class="page-link" href="#" onclick="loadReviewsPage(${data.reviews.current_page + 1})">Next</a></li>` : ''}
                                </ul>
                            </nav>
                        `;
                        reviewsList.appendChild(paginationDiv);
                    }
                }
            })
            .catch(error => {
                console.error('Error loading reviews:', error);
            });
        }

        function loadReviewsPage(page) {
            fetch(`{{ route("products.reviews", $product) }}?page=${page}`)
            .then(response => response.json())
            .then(data => {
                // Update the reviews display
                const reviewsList = document.getElementById('reviewsList');
                // Similar logic as above...
            });
        }

        function showAlert(type, message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.querySelector('.container.mt-5').prepend(alertDiv);

            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }

        function openImageModal(imageSrc) {
            // Create modal for full-size image view
            const modal = document.createElement('div');
            modal.className = 'modal fade';
            modal.innerHTML = `
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <img src="${imageSrc}" class="img-fluid" alt="Review image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);
            new bootstrap.Modal(modal).show();
            modal.addEventListener('hidden.bs.modal', () => modal.remove());
        }

        // Load reviews when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadReviews();
        });
    </script>
@endsection
